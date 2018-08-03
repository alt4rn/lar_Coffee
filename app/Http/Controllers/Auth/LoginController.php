<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Session;
use Redirect;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers {
        logout as performLogout;
    }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected function authenticated(Request $request, $user) {
        if ($user->isAdmin() == '1') {
            return redirect()->route('admin.dashboard'); 
        }
        else if ($user->isAdmin() == '0') {
            $redirectTo = '/home';
        }
    }

    public function authenticates(Request $request) {
        if (Auth::attempt ( array (
            'email' => $request->get ( 'email' ),
            'password' => $request->get ( 'password' ) 
        ) )) {
            session ( [ 
                    'email' => $request->get ( 'email' ) 
            ] );
            if (Auth::user()->isAdmin() == '1') {
                return redirect()->route('admin.dashboard'); 
            }
            else if (Auth::user()->isAdmin() == '0') {
                return redirect()->route('home'); 
            }
        } else {
            Session::flash ( 'message-login', "Invalid Email or Password , Please try again." );
            return Redirect::back ();
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function logout(Request $request)
    {
        $this->performLogout($request);
        return redirect()->route('home');
    }

    public function showLoginForm()
    {
        return view('login');
    }
}
