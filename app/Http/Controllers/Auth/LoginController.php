<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;

use App\User;

class LoginController extends Controller
{
	use AuthenticatesUsers;

	protected $guard = 'admin';
	protected $redirectTo = 'admin/dashboard';

	public function __construct()
	{
		$this->middleware('guest:admin')->except(['logout', 'verify']);
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

		if (method_exists($this, 'hasTooManyLoginAttempts') && $this->hasTooManyLoginAttempts($request))
		{
			$this->fireLockoutEvent($request);

			return $this->sendLockoutResponse($request);
		}

		if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password, 'role_id' => [1]]))
		{
			return redirect()->intended($this->redirectPath());
		}

		$this->incrementLoginAttempts($request);

		return $this->sendFailedLoginResponse($request);
	}

	public function logout(Request $request)
	{
		Auth::guard('admin')->logout();

		// $request->session()->invalidate();

		$request->session()->regenerateToken();

		if ($response = $this->loggedOut($request))
		{
			return $response;
		}

		return $request->wantsJson() ? new Response('', 204) : redirect()->route('admin.login')->with('success', 'You have been logged out successfully!');
	}

	public function verify($token)
	{
		$user = User::where('activation_token', $token)->first();
		if ($user)
		{
			if ($user->status == "P")
			{
				$user->status = "V";
				$user->save();

				$success = "Congratulations, your email has been validated! Please login to our system and do upload your legal documents required for us to approve your request. After that, please wait as your application being reviewed by our team. We will contact you when we have finished checking your documents. You may close this page or redirect to login page from the button below.";

				return view('admin.auth.activation', compact('success'));
			}
			else if ($user->status == "V")
			{
				$message = "Your email has been verified. Please login to our system and do upload your legal documents required for us to approve your request. After that, please wait as your application being reviewed by our team. We will contact you when we have finished checking your documents. You may close this page or redirect to login page from the button below.";

				return view('admin.auth.activation', compact('message'));
			}
			else if ($user->status == "A")
			{
				$message = "Your email is already activated! Please redirect back to the admin login page.";

				return view('admin.auth.activation', compact('message'));
			}
			else
			{
				$error = "Cannot process your request! Your email may not exists in our database or it may has been deleted, deactivated, or blacklisted/banned! Please contact us if you believe this is a mistake.";

				return view('admin.auth.activation', compact('error'));
			}
		}
		else
		{
			$error = 'Incorrect activation code! Please check over the link with the verification code we\'ve sent to your email. If the error still persists, please contact us if you believe this is a mistake.';

			return view('admin.auth.activation', compact('error'));
		}
	}
}
