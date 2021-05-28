<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;

class AdminController extends Controller
{
    public function index()
    {
    	return view('layouts.admin.admin');
    }

    public function highlights()
 	{
 		return view('admin.highlights');
 	}
}
