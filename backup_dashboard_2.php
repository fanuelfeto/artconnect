@extends('layouts.user.user')
@section('title','Welcome')
@section('content')
<!-- Feature 44 -->

<section class="feature_44 bg-light pt-100 text-center text-md-left">
	<div class="container px-xl-0">
		<div class="row align-items-center align-items-lg-start">
			<div class="col-xl-1"></div>
			<div class="col-lg-5 col-md-7" data-aos-duration="600" data-aos="fade-down" data-aos-delay="0">
				<h2 class="mt-20 mb-30 small">Home <br />Accessories</h2>
				<div class="f-22 color-heading text-adaptive">
					We provide comfortable and modern
					accesories for your beloved home and family
					Enjoy the variations of our products
				</div>
				<a href="{{ route('showHomeAccessoriesCatalogue')}}" class="mt-30 btn border-gray color-main">See More</a>
			</div>
			<div class="col-md-1"></div>
			<div class="col-lg-5 col-md-4" data-aos-duration="600" data-aos="fade-down" data-aos-delay="300">
				@if (isset($home_accessories))
				<img class="card-img-top" height="250" src="{{ asset('images/products/'.$home_accessories->productGallery()->first()->picture) }}" class="img-fluid img" alt="..." style="border-radius: 5px;"/>
				@endif
			</div>
		</div>
		<div class="mt-75 row justify-content-center justify-content-md-between align-items-end align-items-lg-start flex-row-reverse row2 mb-50">
			<div class="col-xl-1"></div>
			<div class="col-lg-5 col-md-6 pb-60 pb-lg-0 inner2" data-aos-duration="600" data-aos="fade-down" data-aos-delay="0">
				<h2 class="mt-55 mb-30 small">Add cozy Furniture <br />to your room</h2>
				<div class="f-22 color-heading text-adaptive">
					Nothing as comfort as having cozy couches,
					beds, and eye-catching decorations in your house
				</div>
				<a href="{{ route('showFurnituresCatalogue') }}" class="mt-30 btn border-gray color-main">See More</a>
			</div>
			<div class="col-md-1"></div>
			<div class="col-xl-4 col-lg-5 col-md-5 col-sm-6 col-8" data-aos-duration="600" data-aos="fade-down" data-aos-delay="300">
				@if (isset($furnitures))
				<img src="{{ asset('images/products/'.$furnitures->productGallery()->first()->picture) }}" class="img-fluid img" alt="" style="border-radius: 5px;"/>         
				@endif
			</div>
			<div class="col-xl-1"></div>
		</div>
	</div>
</section>
<!-- Content 31 -->

<section class="content_31 pt-100 pb-70 text-center color-white" style="background-color:#323231;">
	<div class="container px-xl-0">
		<div class="row justify-content-center">
			<h2 class="small col-lg-8" data-aos-duration="600" data-aos="fade-down" data-aos-delay="0">Our Monthly Highlights</h2>
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
					<a href="{{ route('catalogueDetails',['id' => $highlight->id])}}"><img src="{{ asset('images/products/'.$highlight->productGallery()->first()->picture ) }}" alt="" style="width:50%;height:70%;border-radius:30px;"/></a>
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
				@if (isset($paintings))
				<img src="{{ asset('images/products/'.$paintings->productGallery()->first()->picture ) }}" class="mt-55 mb-40 mb-md-0 img-fluid bg" style="width:50%;height:70%;border-radius:30px;" alt="" />
				@endif
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
				@if (isset($sculptures))
				<img src="{{ asset('images/products/'.$sculptures->productGallery()->first()->picture ) }}" alt="" class="img-fluid radius30"  data-aos-duration="600" data-aos="fade-down" data-aos-delay="0" style="width:50%;height:70%;border-radius:30px;"/>
				<h2 class="mt-30 mb-20 small" data-aos-duration="600" data-aos="fade-down" data-aos-delay="300">Sculptures</h2>
				@endif
			</div>
			<div class="col-xl-4 col-lg-6 col-md-8 col-sm-10">
				<div class="color-heading text-adaptive" data-aos-duration="600" data-aos="fade-down" data-aos-delay="600">
				Put the Content Details Here</div>
			</div>
		</div>
	</div>
</section>
@endsection