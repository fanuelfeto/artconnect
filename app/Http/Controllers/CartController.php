<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

use App\CollectionItem;
use App\Order;
use App\OrderItem;

class CartController extends Controller
{

	public function addToCart(Request $request)
	{

		$this->validate($request, [
			'product_id' => 'required',
		]);

		$carts = json_decode($request->cookie('dw-carts'), true); 

		$product = CollectionItem::find($request->product_id);

		$carts[$request->product_id] = [
			'qty' => 1,
			'product_id' => $product->id,
			'product_name' => $product->name,
			'product_price' => $product->price,
			'product_image' => $product->picture1,
			'collection_id' => $product->collection_id
		];

		$cookie = cookie('dw-carts', json_encode($carts), 60);

		return redirect()->back()->cookie($cookie);
	}

	public function listCart()
	{

		$carts = json_decode(request()->cookie('dw-carts'), true);

		$subtotal = collect($carts)->sum(function($q) {
			return $q['product_price']; 
		});

		return view('user.cart', compact('carts', 'subtotal'));
	}

	public function updateCart(Request $request)
	{
		$carts = json_decode(request()->cookie('dw-carts'), true);
		foreach($request->product_id as $key => $row) {
			if($request->qty[$key] == 0) {
				unset($carts[$row]);
			} else {
				$carts[$row]['qty'] = $request->qty[$key];
			}
		}
		$cookie = cookie('dw-carts', json_encode($carts), 60);
		return redirect()->back()->cookie($cookie);
	}

	public function deleteCart(Request $request)
	{
		$prod_id = $request->input('product_id');

		$cookie_data = stripslashes(Cookie::get('dw-carts'));
		$cart_data = json_decode($cookie_data, true);

		$item_id_list = array_column($cart_data, 'product_id');

		if(in_array($prod_id, $item_id_list))
		{
			foreach($cart_data as $keys => $values)
			{
				if($cart_data[$keys]["product_id"] == $prod_id)
				{
					unset($cart_data[$keys]);
					$item_data = json_encode($cart_data);
					$minutes = 60;
					Cookie::queue(Cookie::make('dw-carts', $item_data, $minutes));
					return response()->json(['status'=>'Item Removed from Cart']);
				}
			}
		}
	}

	public function showPaymentForm()
	{
		return view('user.payment_form');
	}

	public function createPaymentForm(Request $request)
	{
		$request->validate([
			'name' => 'required',
			'email' => 'required|email',
			'phone_number' => 'required',
			'address' => 'required',
		]);

		$total = 0;

		$order = Order::create([
			'name' => $request->name,
			'email' => $request->email,
			'phone_number' => $request->phone_number,
			'address' => $request->address,
			'status' => 'A'
		]);

		$carts = json_decode(Cookie::get('dw-carts'), true);
		foreach ($carts as $item)
		{
			$total += $item['product_price'];
			OrderItem::create([
				'order_id' => $order->id,
				'product_id' => $item['product_id'],
				'price' => $item['product_price'],
				'quantity' => $item['qty']
			]);
		}

		Cookie::queue(Cookie::forget('dw-carts'));

		$order->total = $total;
		$order->save();

		return redirect()->route('payment.showUploadPaymentForm', ['order_id' => $order->id]);
	}
}
