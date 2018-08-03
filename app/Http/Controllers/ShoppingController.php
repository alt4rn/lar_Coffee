<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Promotion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Product;
use App\Order;
use App\User;
use Cart;
use Session;
use Carbon\Carbon;
use Auth;
use Mail;
use Illuminate\Support\Facades\Input;

class ShoppingController extends Controller
{
    //
    public function cart(Request $request) 
    {
        $coupon = $request->get('coupon');
        $promotion = Promotion::all();
        $dateNow = Carbon::now();
        $rowId = $request->row_id;
        $qty = $request->qty;
        if (Input::has('submit-update'))
        {
            for($i = 0; $i < count($rowId); $i++) {
                Cart::update($rowId[$i], $qty[$i]);
            }
            return redirect('cart')->with('flash_message', 'Troli berhasil diperbarui!');
        }
        else if (Input::has('submit-checkout'))
        {
            if(Cart::content()->count() <= 0)
            {
                return redirect('cart')->with('error', 'Troli Anda kosong!');
            }
            else if(Cart::content()->count() > 0)
            {
                return redirect()->route('cart.checkout');
            }
        }
        else
        {
            return view('cart');
        }
    }

    public function makeOrder(Request $request)
    {
        if(Cart::content()->count() > 0)
        {
            if (Input::has('submit-coupon'))
            {
                $coupon = $request->coupon;
                $promotion = Promotion::where('coupon', '=', $coupon)->first();
                if(strtotime($promotion->starting_date) <= strtotime(date('Y-m-d H:i:s')) && strtotime(date('Y-m-d H:i:s')) <= strtotime($promotion->end_date))
                {
                    if(str_replace(',','',Cart::subtotal()) >= $promotion->minimum_payment)
                    {
                        $discount = $promotion->discount * str_replace(',','',Cart::subtotal());
                        return view('checkout', compact('discount'))->with('flash_message', 'Kupon berhasil digunakan.');
                    }
                    else if(str_replace(',','',Cart::subtotal()) < $promotion->minimum_payment)
                    {
                        $discount = 0;
                        return view('checkout', compact('discount'))->with('error', 'Maaf. Kupon berlaku untuk minimal pembelian sebesar ' . $promotion->minimum_payment . '.');
                    }
                }
                else if (strtotime($promotion->starting_date) > strtotime(date('Y-m-d H:i:s')) || strtotime(date('Y-m-d H:i:s')) > strtotime($promotion->end_date))
                {
                    $discount = 0;
                    return view('checkout', compact('discount'))->with('error', 'Maaf. Kode yang dimasukkan sudah tidak berlaku.');
                }
                else if(empty($promotion))
                {
                    $discount = 0;
                    return view('checkout', compact('discount'))->with('error', 'Maaf. Kode yang dimasukkan tidak terdaftar.');
                }
            }
            else if (Input::has('submit-order'))
            {
                $this->validate($request, ['re_name' => 'required', 
                                            'delivery_method' => 'required', 
                                            're_phone' => 'required']);
                $user = Auth::user();
                $product_id = $request->product_id;
                $selling_price = $request->selling_price;
                $delivery_cost = '0';
                $note = '';
                $latestOrder = Order::orderBy('created_at', 'DESC')->first();
                if($request->delivery_method == 'GOFOOD')
                {
                    $delivery_cost = '15000';
                }
                else if($request->delivery_method == 'take away')
                {
                    $delivery_cost = '0';
                }
                $quantity = $request->quantity;
                if($request->note != '')
                {
                    $note = $request->note;
                }
                $total = str_replace(',','',Cart::subtotal()) - $request->discount + $delivery_cost;
                $order = Order::create([
                    'order_number' => '#'.str_pad($latestOrder->id + 1, 8, "0", STR_PAD_LEFT),
                    'status' => 'not paid',
                    'user_id' => $user->id,
                    're_name' => $request->re_name,
                    're_address' => $request->re_address,
                    're_phone' => $request->re_phone,
                    'delivery_method' => $request->delivery_method,
                    'delivery_cost' => $delivery_cost,
                    'discount' => $request->discount,
                    'sub_total' => str_replace(',','',Cart::subtotal()),
                    'total' => $total,
                    'note' => $note,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ]);

                for($i = 0; $i < Cart::content()->count(); $i++) {
                    $order_product = DB::table('order_products')->insert([
                        'order_id' => $order->id,
                        'product_id' => $product_id[$i],
                        'selling_price' => $selling_price[$i],
                        'quantity' => $quantity[$i],
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now()
                    ]);
                }

                $data = [
                    'order' => Order::find($order->id),
                    'user' => $user,
                    'total' => $total
                ];
                $admins = User::where('isAdmin', '=', '1')->get();

                Mail::send('emails.invoice', $data, function ($message) use($user) {
                    $message->to($user->email, $user->name)->subject('Tagihan Pesanan');
                    $message->from('albert.pangestu1@gmail.com', 'Coffee Grande');
                });

                foreach($admins as $admin)
                {
                    $dataNo = [
                        'order' => Order::find($order->id),
                        'admin' => $admin,
                        'user' => User::find($order->user_id),
                        'total' => $request->total
                    ];
                    Mail::send('emails.notification', $dataNo, function ($message) use($admin) {
                        $message->to($admin->email, $admin->name)->subject('Pesanan Baru');
                        $message->from('albert.pangestu1@gmail.com', 'Coffee Grande');
                    });
                }
                Cart::destroy();
                return redirect()->route('home')->with('flash_message', 'Pesanan Anda berhasil disimpan. Silahkan cek email Anda untuk melakukan pembayaran.');
            }
        }
        else if(Cart::content()->count <= 0)
        {
            return redirect()->route('cart');
        }
    }

    public function buyOrder()
    {
        if(Cart::content()->count() <= 0)
        {
            return redirect()->route('cart');
        }
        else if(Cart::content()->count() > 0)
        {
            return view('checkout');
        }
    }

    public function addCart(Request $request)
    {
        $product = Product::find($request->product_id); // Produk terpilih
        if(empty($request->quantity))
        {
            $cartItem = Cart::add([ // Tambahkan produk ke Cart
                'id' => $product->id,
                'name' => $product->product_name,
                'price' => $product->product_price,
                'qty' => 1,
            ]);
        }
        else
        {
            $cartItem = Cart::add([ // Tambahkan produk ke Cart
                'id' => $product->id,
                'name' => $product->product_name,
                'price' => $product->product_price,
                'qty' => $request->quantity,
            ]);
        }
        // Asosiasi produk
        Cart::associate($cartItem->rowId, 'App\Product');
        return redirect()->back()->with('flash_message', 'Produk berhasil ditambahkan ke keranjang.');
    }

    public function deleteCart () { // hapus produk
        Cart::remove(request()->row_id);
        return redirect()->back()->with('flash_message', 'Produk berhasil dihapus.');
    }

    // public function checkCoupon(Request $request) 
    // {
        //
        // $coupon = $request->coupon;
        // $promotion = Promotion::where('coupon', '=', '2018diskon')->get();
        // dd($request->coupon);
        // if(strtotime($promotion->starting_date) <= strtotime(date('Y-m-d H:i:s')) && strtotime(date('Y-m-d H:i:s')) <= strtotime($promotion->end_date))
        // {
        //     $discount = $promotion->discount * Cart::subtotal();
        //     return redirect()->back()->with('discount', $discount)->with('flash_message', 'Kupon berhasil digunakan.');
        // }
        // else if (strtotime($promotion->starting_date) > strtotime(date('Y-m-d H:i:s')) || strtotime(date('Y-m-d H:i:s')) > strtotime($promotion->end_date))
        // {
        //     $discount = 0;
        //     return redirect()->back()->with('discount', $discount)->with('error', 'Maaf. Kode yang dimasukkan tidak dapat digunakan.');
        // }
        // else if(empty($promotion))
        // {
        //     $discount = 0;
        //     return redirect()->back()->with('discount', $discount)->with('error', 'Maaf. Kode yang dimasukkan tidak terdaftar.');
        // }
    // }
}
