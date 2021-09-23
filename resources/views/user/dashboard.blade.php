@extends('layouts.user.user')
@section('title','Welcome')
@section('content')
<!-- Feature 44 -->

<section class="feature_44 bg-light pt-60 text-center text-md-left">
	<div class="container px-xl-0">
		<div class="row align-items-center align-items-lg-start">
			<div class="col-lg-4 col-md-5" data-aos-duration="600" data-aos="fade-down" data-aos-delay="0">
				@if (isset($home_accessories))
				<img style="border-radius: 0px;"class="card-img-top" height="350" src="{{ asset('images/home_accessories_1.jpeg') }}" class="img-fluid img" alt="..." style="border-radius: 5px;"/>
				@endif
			</div>
			<div class="col-lg-8 col-md-7" data-aos-duration="600" data-aos="fade-down" data-aos-delay="300">
				<img style="border-radius: 0px;" class="card-img-top" height="350" src="{{ asset('images/home_accessories_2.jpeg') }}" class="img-fluid img" alt="..." style="border-radius: 5px;"/>
			</div>
		</div>
		<div class="row text-center text-md-left">
			<div class="col-xl-1"></div>
			<div class="col-xl-10 col-md-12 mt-40 mb-40" data-aos-duration="600" data-aos="fade-down" data-aos-delay="300">
				<div class="mb-20 f-18 medium title text-center">Home Accessories</div>
				<div class="color-heading text-adaptive text-center">
					Lorem ipsum dolor sit amet, consectetur adipisci elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur.
				</div>
			</div>
			<div class="col-xl-1"></div>
		</div>
		<div class="mt-75 row justify-content-center justify-content-md-between align-items-end align-items-lg-start flex-row-reverse row2 mb-100">
			<div class="col-xl-1"></div>
			<div class="col-lg-5 col-md-6 pb-60 pb-lg-0 inner2" data-aos-duration="600" data-aos="fade-down" data-aos-delay="0">
				<div class="mb-20 f-18 medium title">Add cozy Furniture <br />to your room</div>
				<div class="color-heading text-adaptive">
					Nothing as comfort as having cozy couches,
					beds, and eye-catching decorations in your house
				</div>
			</div>
			<div class="col-md-1"></div>
			<div class="col-xl-4 col-lg-5 col-md-5 col-sm-6 col-8" data-aos-duration="600" data-aos="fade-down" data-aos-delay="300">
				<img src="{{ asset('images/furniture.jpeg') }}" class="img-fluid img" alt=""/>         
			</div>
			<div class="col-xl-1"></div>
		</div>
	</div>
</section>
<!-- Content 31 -->

<section class="content_31 pt-40 pb-70 text-center color-white" style="background-color:#323231;">
	<div class="container px-xl-0">
		<div class="row justify-content-center">
			<div class="col-lg-8 f-18 medium op-7 text-adaptive" data-aos-duration="600" data-aos="fade-down" data-aos-delay="0">Our Monthly Highlights</div>
			<div class="col-lg-8 mt-25 mb-55 f-18 medium op-7 text-adaptive">
				<span data-aos-duration="600" data-aos="fade-down" data-aos-delay="300">                
					Checkout our products' spotlight<br />
					We always provide an stunning and comfortable furniture with 
				the best price</span>             
			</div>
		</div>
		<div class="row justify-content-center">
			@forelse ($highlights as $highlight)
			<div class="col-lg-3 col-md-5 col-sm-6" data-aos-duration="600" data-aos="fade-down" data-aos-delay="0">
				<div class="mx-auto mb-30 mw-270 h-160 d-flex justify-content-center align-items-center">
					<a href="{{ route('catalogueDetails',['id' => $highlight->id])}}">
						@if ($highlight->productGallery()->first())
						<img src="{{ asset('images/products/'.$highlight->productGallery()->first()->picture ) }}" alt="" style="width:50%; height:70%;" />
						@else
						<img src="{{ asset('images/no_image_available_500_x_500.svg') }}" class="bg-light" alt="" style="width:50%; height:70%;" />
						@endif
					</a>
				</div>
			</div>
			@empty
			<div class="col text-center">
				<h1 class="my-5">No Product to Highlight</h1>
			</div>
			@endforelse
		</div>
		<!-- <div class="col-lg-3 col-md-5 col-sm-6" data-aos-duration="600" data-aos="fade-down" data-aos-delay="150">
			<div class="mx-auto mb-30 mw-270 h-160 d-flex justify-content-center align-items-center radius6 block">
				<img srcset="i/content_37_logo_2@2x.png 2x" src="i/content_37_logo_2.png" alt="" />
			</div>
		</div>
		<div class="col-lg-3 col-md-5 col-sm-6" data-aos-duration="600" data-aos="fade-down" data-aos-delay="300">
			<div class="mx-auto mb-30 mw-270 h-160 d-flex justify-content-center align-items-center radius6 block">
				<img srcset="i/content_37_logo_3@2x.png 2x" src="i/content_37_logo_3.png" alt="" />
			</div>
		</div>
		<div class="col-lg-3 col-md-5 col-sm-6" data-aos-duration="600" data-aos="fade-down" data-aos-delay="450">
			<div class="mx-auto mb-30 mw-270 h-160 d-flex justify-content-center align-items-center radius6 block">
				<img srcset="i/content_37_logo_4@2x.png 2x" src="i/content_37_logo_4.png" alt="" />
			</div>
		</div>
		<div class="col-lg-3 col-md-5 col-sm-6" data-aos-duration="600" data-aos="fade-down" data-aos-delay="600">
			<div class="mx-auto mb-30 mw-270 h-160 d-flex justify-content-center align-items-center radius6 block">
				<img srcset="i/content_37_logo_5@2x.png 2x" src="i/content_37_logo_5.png" alt="" />
			</div>
		</div>
		<div class="col-lg-3 col-md-5 col-sm-6" data-aos-duration="600" data-aos="fade-down" data-aos-delay="750">
			<div class="mx-auto mb-30 mw-270 h-160 d-flex justify-content-center align-items-center radius6 block">
				<img srcset="i/content_37_logo_6@2x.png 2x" src="i/content_37_logo_6.png" alt="" />
			</div>
		</div>
		<div class="col-lg-3 col-md-5 col-sm-6" data-aos-duration="600" data-aos="fade-down" data-aos-delay="900">
			<div class="mx-auto mb-30 mw-270 h-160 d-flex justify-content-center align-items-center radius6 block">
				<img srcset="i/content_37_logo_7@2x.png 2x" src="i/content_37_logo_7.png" alt="" />
			</div>
		</div>
		<div class="col-lg-3 col-md-5 col-sm-6" data-aos-duration="600" data-aos="fade-down" data-aos-delay="1050">
			<div class="mx-auto mb-30 mw-270 h-160 d-flex justify-content-center align-items-center radius6 block">
				<img srcset="i/content_37_logo_8@2x.png 2x" src="i/content_37_logo_8.png" alt="" />
			</div>
		</div>
	</div> -->
</div>
</section>

<!-- Feature 13 -->

<section class="feature_13 bg-light pt-100 pb-50">
	<div class="container px-xl-0">
		<div class="row justify-content-center">
			<div class="col-xl-8 col-lg-10 text-center" data-aos-duration="600" data-aos="fade-down" data-aos-delay="0">
				<h6 class="f-22 regular">
					See various Paintings from many cities in Indonesia
				</h6>
			</div>
			<div class="col-xl-11 text-center" data-aos-duration="600" data-aos="fade-down" data-aos-delay="300">
				<img src="{{ asset('images/painting.jpeg') }}" class="mt-55 mb-40 mb-md-0 img-fluid bg" style="width:50%;height:70%;" alt="" />
			</div>
		</div>
		<div class="row text-center text-md-left">
			<div class="col-xl-1"></div>
			<div class="col-xl-5 col-md-6 mb-40" data-aos-duration="600" data-aos="fade-down" data-aos-delay="0">
				<div class="mb-20 f-18 medium title">Put the Content Details here</div>
				<div class="color-heading text-adaptive">
					Lorem ipsum dolor sit amet, consectetur adipisci elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur.
				</div>
			</div>
			<div class="col-xl-5 col-md-6 mb-40" data-aos-duration="600" data-aos="fade-down" data-aos-delay="300">
				<div class="mb-20 f-18 medium title">Put the Content Details here</div>
				<div class="color-heading text-adaptive">
					Lorem ipsum dolor sit amet, consectetur adipisci elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur.
				</div>
			</div>
			<div class="col-xl-1"></div>
		</div>
	</div>
</section>
<!-- Call to Action 7 -->

<section class="call_to_action_7 bg-light pt-100 pb-100 text-center">
	<div class="container px-xl-0">
		<div class="row justify-content-center">
			<div class="col-xl-9 col-lg-10">
				<img src="{{ asset('images/sculpture.jpeg' ) }}" alt="" class="img-fluid"  data-aos-duration="600" data-aos="fade-down" data-aos-delay="0" style="width:50%;height:70%;"/>
				<div class="mt-20 mb-20 f-18 medium title text-center" data-aos-duration="600" data-aos="fade-down" data-aos-delay="300">Sculptures</div>
			</div>
			<div class="col-xl-4 col-lg-6 col-md-8 col-sm-10">
				<div class="color-heading text-adaptive" data-aos-duration="600" data-aos="fade-down" data-aos-delay="600">
				Put the Content Details Here</div>
			</div>
		</div>
	</div>
</section>
@endsection