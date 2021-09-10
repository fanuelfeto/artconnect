<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;

use App\Order;

class AdminOrderController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth:admin');
	}

	public function index()
	{
		$orders = Order::all();
		return view('admin.order.index',compact('orders'));
	}

	public function details($id)
	{
		$order = Order::find($id);
		return view('admin.order.detail', compact('order'));
	}

	public function showEditForm($id)
	{
		$order = Order::find($id);
		return view('admin.order.edit_form', compact('order'));
	}

	public function update (Request $request)
	{
		$request->validate([
			"id" => "required|integer",
			"status" => "required"
		]);

		$order = Order::find($request->id);
		$order->status = $request->status;
		$order->save();

		return redirect()->route('admin.order.index')->with("success", "Order's status successfully updated!");
	}

	
}
