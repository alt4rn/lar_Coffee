<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\User;
use Auth;
use Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.dashboard');
    }

    public function openProfile($id)
    {
        //
        $user = User::findOrFail($id);
        return view('members.profile', compact('user'));
    }

    public function users(Request $request)
    {
        $keyword = $request->get('search');
        $users = User::paginate(8);
        if (!empty($keyword)) {
            $users = User::where('name', 'LIKE', "%$keyword%")->orWhere('email', 'LIKE', "%$keyword%")->orderBy('isAdmin', 'desc')->orderBy('active', 'desc')
                ->paginate(8);
        } else {
            $users = User::orderBy('isAdmin', 'desc')->orderBy('active', 'desc')->paginate(8);
        }
        return view('admin.users.index', compact('users'));
    }

    public function login()
    {
        return view('login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.users.create');
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
        $this->validate($request, ['name' => 'required', 'email' => 'required', 'password' => 'required|min:6|confirmed', 'password_confirmation' => 'required|min:6']);
        $data = $request->except('password');
        $data['password'] = bcrypt($request->password);
        $user = User::create($data);
        return redirect('admin/users')->with('flash_message', 'User added!');
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
        $user = User::findOrFail($id);
        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    public function activeUser($id)
    {
        $user = User::findOrFail($id);
        if($user->active == '0')
        {
            $user->active = '1';
            $user->save();
        }
        else if($user->active == '1')
        {
            $user->active = '0';
            $user->save();
        }
        return redirect()->route('admin.users.index')->with('flash_message', 'Status pengguna berhasil diperbarui.');
    }

    public function updateUser($id, Request $request)
    {
        $user = User::findOrFail($id);
        $this->validate($request, ['name' => 'required', 'email' => 'required']);
        if (empty($request->password))
        {
            $data = $request->except('password');
            $user->update($data);
        }
        else 
        {
            $data['password'] = bcrypt($request->password);
            $user->User::update($data);
        }
        return redirect('admin/users')->with('flash_message', 'User updated!');
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
        $user = Auth::user();
        $user = User::findOrFail($id);
        $this->validate($request, ['name' => 'required', 'address' => 'required', 'phone' => 'required']);
        $data = $request->all();
        $user->update($data);
        Session::flash('info', 'Data diri berhasil diperbarui!');
        return redirect()->back();
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
        $order = Order::where('user_id', '=', $id)->get();
        $result = count($order);
        if($result > 0)
        {
            return redirect('admin/users')->with('error', 'Maaf. Pengguna tidak dapat dihapus.');
        }
        else if($result <= 0)
        {
            User::destroy($id);
            return redirect('admin/users')->with('flash_message', 'Pengguna berhasil dihapus!');
        }
    }
}
