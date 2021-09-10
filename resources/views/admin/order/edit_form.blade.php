@extends('layouts.admin.admin')
@section('title','Edit Status')

@section('content')
<div class="container-fluid">
	<div class="fade-in">

		@include('components.alerts')

		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
				<li class="breadcrumb-item"><a href="{{ route('admin.order.index') }}">Order</a></li>
				<li class="breadcrumb-item active" aria-current="page">Edit Status</li>
			</ol>
		</nav>

		<div class="card">
			<div class="card-header">
				<h4>Edit Status</h4>
			</div>
			<div class="card-body">
				<form method="POST" action="{{ route('admin.order.update') }}">
					@csrf

					<input type="hidden" name="id" value="{{ $order->id }}" hidden>

					<div class="form-group">
						<select class="form-control" name="status" required>
							<option value="A" {{ $order->status == 'A' ? 'selected' : '' }}>Active</option>
							<option value="P" {{ $order->status == 'P' ? 'selected' : '' }}>Pending / On Progress</option>
							<option value="C" {{ $order->status == 'C' ? 'selected' : '' }}>Completed</option>
							<option value="D" {{ $order->status == 'D' ? 'selected' : '' }}>Canceled</option>
						</select>
					</div>

					<button class="btn btn-success">Update</button>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection