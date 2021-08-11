@extends('layouts.admin.admin')
@section('title','Orders')

@section('content')
<div class="container-fluid">
	<div class="fade-in">

		@include('components.alerts')

		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
				<li class="breadcrumb-item active" aria-current="page">Product</li>
			</ol>
		</nav>

		<div class="card">
			<div class="card-header">
				<h4>Orders</h4>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-hover">
						<thead class="thead-dark">
							<tr>
								<th>Name</th>
								<th>Email</th>
								<th>Phone Number</th>
								<th>Address</th>
								<th>Total</th>
								<th>Payer</th>
								<th>Payment Proof</th>
								<th>Status</th>
							</tr>
						</thead>
						<tbody>
							@forelse ($orders as $order)
							<tr>
								<td>{{ $order->name }}</td>
								<td>{{ $order->email }}</td>
								<td>{{ $order->phone_number }}</td>
								<td>{{ $order->address }}</td>
								<td>{{ $order->total }}</td>
								<td>{{ $order->payer }}</td>
								<td>{{ $order->payment_proof }}</td>
								<td>{{ $order->status }}</td>
							</tr>
							@empty
							<tr>
								<td colspan="6">Tidak ada pesanan.</td>
							</tr>
							@endforelse
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection