@extends('layouts.user.user')
@section('title','Order ID')
@section('content')  
<!--================Home Banner Area =================-->
<section class="banner_area my-5">
	<div class="banner_inner d-flex align-items-center">
		<div class="container">
			<div class="banner_content text-center mt-20 mb-20">
				<h3>Check Order ID</h3>
			</div>
		</div>
	</div>
</section>
<!--================End Home Banner Area =================-->

<!--================Cart Area =================-->
<section class="cart_area mb-80">
	<div class="container">
		@if (session('success'))
		<div class="alert alert-success alert-dismissible fade show" role="alert">
			<div class="alert-body">
				<i data-feather="check-circle"></i>
				<span><strong>Success!</strong> {{ session('success') ?? "" }}</span>
			</div>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		@endif

		@if (session('error'))
		<div class="alert alert-danger alert-dismissible fade show" role="alert">
			<div class="alert-body">
				<i data-feather="x-circle"></i>
				<span><strong>Error!</strong> {{ session('error') ?? "" }}</span>
			</div>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		@endif
		<form method="POST" action="{{ route('payment.checkOrder') }}">
			@csrf
			<div class="form-group">
				<label>Order ID <span class="text-danger font-weight-bold">* required</span></label>
				<input type="number" name="order_id" class="form-control form-control-lg" min="1" required />
			</div>

			<button type="submit" name="a" class="btn btn-primary bg-primary">Check</button>
		</form>
	</div>
</section>
<!--================End Cart Area =================-->
@endsection