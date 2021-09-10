@extends('layouts.admin.admin')
@section('title','Orders')

@section('content')
<div class="container-fluid">
	<div class="fade-in">

		@include('components.alerts')

		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
				<li class="breadcrumb-item active" aria-current="page">Order</li>
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
								<th>ID</th>
								<th>Name</th>
								<th>Email</th>
								<th>Phone Number</th>
								<th>Address</th>
								<th>Total</th>
								<th>Payer</th>
								<th>Payment Proof</th>
								<th>Status</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
							@forelse ($orders as $order)
							<tr>
								<td>{{ $order->id }}</td>
								<td>{{ $order->name }}</td>
								<td>{{ $order->email }}</td>
								<td>{{ $order->phone_number }}</td>
								<td>{{ $order->address }}</td>
								<td>Rp {{ number_format($order->total, 0, ',', '.') }}</td>
								<td>{{ $order->payer }}</td>
								<td>{{ $order->payment_proof }}</td>
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
								<td>
									<a href="{{ route('admin.order.details', ['id' => $order->id]) }}" class="btn btn-info btn-sm">Details</a>
									<a href="{{ route('admin.order.showEditForm', ['id' => $order->id]) }}" class="btn btn-success btn-sm">Update Status</a>
								</td>
							</tr>
							@empty
							<tr>
								<td colspan="10">Tidak ada pesanan.</td>
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