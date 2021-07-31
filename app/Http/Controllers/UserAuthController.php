<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use App\User;

class UserAuthController extends Controller
{
    use AuthenticatesUsers;

    protected $guard = 'web';
    protected $redirectTo = '';

    public function __construct()
    {
        $this->middleware('guest:web')->except(['logout', 'verify']);
    }

    public function showLoginForm()
    {
        if (Auth::viaRemember())
        {
            return redirect($this->redirectTo);
        }
        return view('user.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|max:255',
            'password' => 'required|string|max:255|min:8',
        ]);

        if (method_exists($this, 'hasTooManyLoginAttempts') && $this->hasTooManyLoginAttempts($request))
        {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if (Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password, 'role_id' => 3, 'status' => "A"], $request->remember))
        {
            return redirect()->intended($this->redirectPath());
        }

        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        // $request->session()->invalidate();

        $request->session()->regenerateToken();

        if ($response = $this->loggedOut($request))
        {
            return $response;
        }

        return $request->wantsJson() ? new Response('', 204) : redirect()->route('elearning.login')->with('success', 'Anda berhasil logout!');
    }
}
