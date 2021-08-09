<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;

class AdminController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth:admin');
	}

	public function dashboard()
	{
		return view('admin.dashboard');
	}
}
