<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;

class AdminController extends Controller
{
    public function dashboard()
    {
    	return view('layouts.admin');
    }
}
