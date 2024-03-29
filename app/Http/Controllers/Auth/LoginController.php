<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;
    protected function authenticated()
    {
        // dd(Auth::user()->role_as);
        // dd(session('status'));

        if(Auth::user()->role_as == "1")
        {
            return redirect('dashboard')->with('status','welcome to your dashboard');

        }
        elseif(Auth::user()->role_as == "0")
        {
            return redirect('/')->with('status','Logged in successfully');
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
}
