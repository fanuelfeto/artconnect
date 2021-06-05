<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controlllers\Controller;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Response;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\User;

class AdminAuthController extends \App\Http\Controllers\Controller
{
	use AuthenticatesUsers;

    protected $guard = 'admin';
    protected $redirectTo = 'admin/dashboard';

    public function __construct()
    {
    	$this->middleware('guest:admin')->except(['logout']);
    } 

    public function showLoginForm()
    {
    	if (Auth::viaRemember())
    	{
    		return redirect($this->redirectTo);
    	}
    	return view('admin.auth.login');
    }

    public function login(Request $request)
    {
    	$request->validate([
    		'email' => 'required|string|max:255',
    		'password' => 'required|min:8',
    	]);

        // $credentials = $request->only('email','password');
        // if (Auth::attempt($credentials)){
        //     return redirect()->intended('admin.dashboard');
        // }

    	if (Auth::guard('admin')->attempt(['email'=>$request->email,'password'=>$request->password,'role_id'=>[1]]))
    	{
    		return redirect()->intended($this->redirectPath());
    	}

    	$this->incrementLoginAttempts($request);

    	return $this->sendFailedLoginResponse($request);
    }

    public function logout(Request $request)
    {
    	Auth::guard('admin')->logout();

    	$request->session()->regenerateToken();

    	if($response = $this->loggedOut($request))
    	{
    		return $response;
    	}

    	return $request->wantsJson() ? new Response('',204) : redirect()->route('admin.login');
    }
}
