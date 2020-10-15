<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;

class CustomerLoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/customer/home';

    public function __construct()
    {
        $this->middleware('guest:customer')->except('logout')->except('index');
    }

    public function index(){
          return view('customer.content.home');
    }

    public function showLoginForm()
    {
          return view('auth.customerlogin');
    }

    public function showRegisterForm()
    {
          return view('auth.customerregister');
    }

    public function username()
    {
            return 'username';
    }

    protected function guard()
    {
          return Auth::guard('customer');
    }

    public function register(Request $request)
    {
          $request->validate([
              'username'      => 'required|string|unique:customers',
              'email'         => 'required|string|email|unique:customers',
              'password'      => 'required|string|min:6|confirmed'
          ]);
          \App\Customer::create($request->all());
          return redirect()->route('customer.registerform')->with('success', 'Successfully register!');
    }
}
