@extends('layouts.user.user')
@section('title','Cart')
@section('content')  
<section class="form_13 bg-light pt-105 pb-100">
	<div class="container px-xl-0">
		<div class="row justify-content-center">
			<div class="col-xl-10">
				<h2 class="mb-55 small text-center" data-aos-duration="600" data-aos="fade-down" data-aos-delay="0">Identity Form</h2><br>
				<h5>Please fill this form before process the payment</h5>
				<form action="{{ route('createPaymentForm') }}" method="post">
					<div class="mb-30 px-65 pt-45 pb-45 radius10 js-form-block" data-aos-duration="600" data-aos="fade-down" data-aos-delay="0">
						<div class="ml-30 inner">
							<div class="w-370 block">
								<input type="text" name="username" placeholder="Your fullname" class="mt-25 input w-full border-gray focus-action-1 color-heading placeholder-heading" />
							</div>
						</div>
						<div class="ml-30 inner">
							<div class="w-370 block">
								<input type="email" name="email" placeholder="Email address" class="mt-25 input w-full border-gray focus-action-1 color-heading placeholder-heading" />
							</div>
						</div>
						<div class="ml-30 inner">
							<div class="w-370 block">
								<input type="text" name="notelp" placeholder="Phone Number" class="mt-25 input w-full border-gray focus-action-1 color-heading placeholder-heading"/>
							</div>
						</div>
						<div class="ml-30 inner">
							<div class="w-370 block">
								<input type="text" name="address" placeholder="Your address" class="mt-25 input w-full border-gray focus-action-1 color-heading placeholder-heading" style="height:200px;"/>
							</div>
						</div>
						<div class="ml-30 mt-30 inner">
							<a href="#" class="btn action-1">Process</a>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>
@endsection