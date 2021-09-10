@extends('layouts.admin.admin')
@section('title','Order Details')

@section('content')
<div class="container-fluid">
	<div class="fade-in">

		@include('components.alerts')

		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
				<li class="breadcrumb-item"><a href="{{ route('admin.order.index') }}">Order</a></li>
				<li class="breadcrumb-item active" aria-current="page">Details</li>
			</ol>
		</nav>

		<div class="card">
			<div class="card-header">
				<h4>Order Details</h4>
			</div>
			<div class="card-body">
				<table cellpadding="5">
					<tr valign="top" class="font-weight-bold">
						<td>Order ID</td>
						<td>:</td>
						<td>{{ $order->id }}</td>
					</tr>
					<tr valign="top">
						<td>Customer's Name</td>
						<td>:</td>
						<td>{{ $order->name }}</td>
					</tr>
					<tr valign="top">
						<td>Email</td>
						<td>:</td>
						<td>{{ $order->email }}</td>
					</tr>
					<tr valign="top">
						<td>Phone Number</td>
						<td>:</td>
						<td>{{ $order->phone_number }}</td>
					</tr>
					<tr valign="top">
						<td>Address</td>
						<td>:</td>
						<td>{{ $order->address }}</td>
					</tr>
					<tr valign="top">
						<td>Status</td>
						<td>:</td>
						<td>
							@if ($order->status == "A")
							<span class="font-weight-bold text-info">Active</span>
							@elseif ($order->status == "P")
							<span class="font-weight-bold text-warning">On Progress</span>
							@elseif ($order->status == "C")
							<span class="font-weight-bold text-success">Complete</span>
							@elseif ($order->status == "D")
							<span class="font-weight-bold text-danger">Canceled</span>
							@endif
						</td>
					</tr>
					<tr valign="top">
						<td>Total Payment</td>
						<td>:</td>
						<td><strong>Rp {{ number_format($order->total, 0, ',', '.') }}</strong></td>
					</tr>
				</table>
				
				<hr>
				<h4 class="mb-2">Ordered Items</h4>
				@if ($order->orderItem()->count() > 0)
				<ol class="list-group">
					@foreach ($order->orderItem()->get() as $order_item)
					<li class="list-group-item">
						<div class="d-flex justify-content-between">
							<span>{{ $order_item->product->name }} &times;{{ $order_item->quantity }}</span>
							<strong>Rp {{ number_format($order_item->price * $order_item->quantity , 0, ',', '.') }}</strong>
						</div>
					</li>
					@endforeach
				</ol>
				@endif
			</div>
		</div>
	</div>
</div>
@endsection