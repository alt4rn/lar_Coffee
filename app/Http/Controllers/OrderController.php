<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Order;
use App\User;
use App\OrderProduct;
use App\Product;
use Auth;
use Mail;
use Carbon\Carbon;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        $search = $request->get('search');
        $orders = Order::paginate(8);
        $users = User::all();
        if (!empty($search))
        {
            $orders = Order::where('status', '=', $search)->latest()->paginate(8);
            return view('admin.orders.index', compact('orders'));
        }
        else if (empty($search))
        {
            $orders = Order::orderByRaw("FIELD(status,\"not paid\", \"being processed\", 
                                \"ready to take\", \"sending\", \"done\", \"canceled\")")
                        ->latest()
                        ->paginate(8);
            return view('admin.orders.index', compact('orders'));
        }
    }

    public function statusOrder($id)
    {
        $order = Order::findOrFail($id);
        $admins = User::where('isAdmin', '=', '1')->get();
        $penerima = User::where('id', '=', $order->user_id)->first();

        if($order->status == 'not paid' || $order->status == 'being processed')
        {
            $order->status = 'canceled';
            $order->updated_at = Carbon::now();
            $order->save();

            // data yang akan dikirim kepada surel pemesan
            $data = [
                'order' => $order,
                'user' => $penerima,
            ];
            Mail::send('emails.update', $data, function ($message) use($penerima) {
                $message->to($penerima->email, $penerima->name)->subject('Status Pesanan Telah Dibatalkan');
                $message->from('albert.pangestu1@gmail.com', 'Coffee Grande');
            });

            // data yang akan dikirim kepada surel setiap admin
            foreach($admins as $admin)
            {
                $dataNo = [
                    'order' => $order,
                    'admin' => $admin,
                    'user' => $penerima,
                ];
                Mail::send('emails.update', $dataNo, function ($message) use($admin) {
                    $message->to($admin->email, $admin->name)->subject('Pesanan Telah Dibatalkan');
                    $message->from('albert.pangestu1@gmail.com', 'Coffee Grande');
                });
            }
            return redirect()->route('admin.orders.index')->with('flash_message', 'Status pesanan berhasil dibatalkan.');
        }
        else if($order->status == 'ready to take' || $order->status == 'sending')
        {
            $order->status = 'done';
            $order->updated_at = Carbon::now();
            $order->save();
            
            // data yang akan dikirim kepada surel pemesan
            $data = [
                'order' => $order,
                'user' => $penerima,
            ];
            Mail::send('emails.update', $data, function ($message) use($penerima) {
                $message->to($penerima->email, $penerima->name)->subject('Status Pesanan Telah Selesai');
                $message->from('albert.pangestu1@gmail.com', 'Coffee Grande');
            });

            // data yang akan dikirim kepada surel setiap admin
            foreach($admins as $admin)
            {
                $dataNo = [
                    'order' => $order,
                    'admin' => $admin,
                    'user' => $penerima,
                ];
                Mail::send('emails.update', $dataNo, function ($message) use($admin) {
                    $message->to($admin->email, $admin->name)->subject('Pesanan Sudah Selesai');
                    $message->from('albert.pangestu1@gmail.com', 'Coffee Grande');
                });
            }
            return redirect()->route('admin.orders.index')->with('flash_message', 'Status pesanan berhasil diselesaikan.');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function userOrder($id)
    {
        if($id == Auth::user()->id)
        {
            $latest = Order::where('user_id', '=', $id)
                            ->whereIn('status', ['not paid', 'being processed', 'ready to take', 'sending'])
                            ->latest()
                            ->paginate(8);
            $history = Order::where('user_id', '=', $id)
                            ->whereIn('status', ['done', 'canceled'])
                            ->latest()
                            ->paginate(8);
            return view('members.order', compact('latest', 'history'));
        }
        else if ($id != Auth::user()->id)
        {
            return redirect()->route('home')->with('error', 'Akses ditolak.');
        }
    }

    public function orderDetail($id)
    {
        $order = Order::findOrFail($id);
        $detail = DB::table('order_products')->where('order_id', $id)->get();
        $reviewB = true;
        $orderStatus = '';
        if($order->status == 'not paid' || $order->status == 'canceled')
        {
            $reviewB = false;
        }
        if($order->status == 'not paid')
            $orderStatus = 'Belum Dibayar';
        else if($order->status == 'being processed')
            $orderStatus = 'Sedang Diproses';
        else if($order->status == 'ready to take')
            $orderStatus = 'Siap Diambil';
        else if($order->status == 'sending')
            $orderStatus = 'Sedang Dikirim';
        else if($order->status == 'done')
            $orderStatus = 'Selesai';
        else if($order->status == 'canceled')
            $orderStatus = 'Dibatalkan';
        return view('members.detail', compact('order', 'detail', 'reviewB', 'orderStatus'));
    }

    public function orderUpdate($id)
    {
        // untuk update order user yang sedang berjalan
        $order = Order::findOrFail($id);
        if($order->status == 'not paid' || $order->status == 'being processed')
        {
            $order->status = 'canceled';
            $order->save();
            return redirect()->route('user.order', ['id' => Auth::user()->id])->with('flash_message', 'Pesanan berhasil dibatalkan');
        }
        else if($order->status == 'ready to take' || $order->status == 'sending')
        {
            return redirect()->route('user.order', ['id' => Auth::user()->id])->with('error', 'Mohon maaf, pesanan tidak dapat dibatalkan.');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $order = Order::findOrFail($id);
        $orderDetail = DB::table('order_products')->where('order_id', $id)->get();
        return view('admin.orders.show', compact('order', 'orderDetail'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = Order::findOrFail($id);
        $user = User::findOrFail($order->user_id);
        return view('admin.orders.edit', compact('order', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        if($request->delivery_method == 'take away')
        {
            request()->validate(['re_name' => 'required', 're_phone' => 'required', 'status' => 'required']);
        }
        else if($request->delivery_method == 'GOFOOD')
        {
            request()->validate(['re_name' => 'required', 're_address' => 'required', 're_phone' => 'required', 'status' => 'required']);
        }
        $order = Order::findOrFail($id)->update($request->all());
        return redirect()->route('admin.orders.index')->with('flash_message', 'Pesanan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $order = Order::findOrFail($id);
        $order->delete();
        return redirect()->route('admin.orders.index')->with('flash_message', 'Pesanan berhasil dihapus.');
    }
}
