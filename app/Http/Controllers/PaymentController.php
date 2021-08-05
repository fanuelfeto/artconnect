<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

use App\Order;
use App\OrderItem;

class PaymentController extends Controller
{
	public function index()
	{
		return view('user.payment.index');
	}

	public function checkOrder(Request $request)
	{
		$order = Order::find($request->order_id);

		if($order)
		{
			return redirect()->route('payment.showUploadPaymentForm', ['order_id' => $order->id]);
		}

		return redirect()->back()->with('error', "Order ID doesn't exist!");
	}

	public function showUploadPaymentForm($order_id)
	{
		$order = Order::find($order_id);

		if($order)
		{
			return view('user.payment.upload_payment_form', compact('order'));
		}

		return redirect()->route('payment.index');
	}

	public function uploadPayment(Request $request)
	{
		$request->validate([
			'order_id' => 'required|integer',
			'payer' => 'required',
			'payment_proof' => 'required|image|mimes:jpeg,png,jpg|max:2048',
		]);

		$order = Order::find($request->order_id);

		if($order)
		{
			$order->payer = $request->payer;
			$order->status = "P";

			// save payment proof
			$image_path = public_path('/payment');
			$payment_proof_image_name = "";
			
			if ($request->hasFile('payment_proof'))
			{
				$payment_proof_image = $request->file('payment_proof');
				
				$payment_proof_image_name = $order->id . '_image_payment_proof.' . $payment_proof_image->getClientOriginalExtension();
				
				$payment_proof_image->move($image_path, $payment_proof_image_name);
				
				$order->payment_proof = $payment_proof_image_name;
			}

			$order->save();

			return redirect()->back()->with('success', "Bukti Bayar berhasil diunggah!");
		}

		return redirect()->route('dashboard');
	}

	public function cancelOrder(Request $request)
	{
		$request->validate([
			'order_id' => 'required|integer'
		]);

		$order = Order::find($request->order_id);

		if($order)
		{
			if($order->status == "A")
			{
				$order->status = "D";
				$order->save();

				return redirect()->back()->with('success', 'This order has been successfully canceled!');
			}

			return redirect()->back()->with('error', 'This order cannot be canceled!');
		}

		return redirect()->back()->with('error', 'The order ID is not found!');
	}
}
