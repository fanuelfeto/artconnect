@extends('layouts.user.user')
@section('title','Item Details')

@section('content')
<section class="feature_44 bg-light pt-100 text-center text-md-left">
	<div class="container px-xl-0 mb-100">
		<div class="mt-20 row justify-content-center justify-content-md-between align-items-end align-items-lg-start flex-row-reverse row2">
			<div class="col-xl-1"></div>
			<div class="col-lg-5 col-md-6 pb-60 pb-lg-0 inner2" data-aos-duration="600" data-aos="fade-down" data-aos-delay="0">
				<h2 class="mt-55 mb-30 small">{{ $product->name }}</h2>
				<div class="f-22 color-heading text-adaptive">
					{{ $product->description }}<br><br><br>
				</div>
				<div class="f-18 text-adaptive">
					Size: {{ $product->width }} x {{ $product->height }} cm<br><br>
					Rp {{ number_format($product->price, 0, '.', ',') }}
				</div><br><br>

				<form action="{{ route('addtoCart') }}" method="POST" enctype="multipart/form-data" id="add-to-cart">
					@csrf
					<div class="product_count" style="font-size:20px;">
						<sup>*limited to 1 item only</sup>

						<input type="hidden" name="product_id" value="{{ $product->id }}" class="form-control">
					</div>
					<div class="card_area">
						<button type="submit" class="mt-30 btn border-gray color-main mb-3 mb-lg-0" id="btn-submit">Add to Cart</button>
					</div>
				</form>
			</div>
			<div class="col-md-1"></div>
			<div class="col-xl-4 col-lg-5 col-md-5 col-sm-6 col-8" data-aos-duration="600" data-aos="fade-down" data-aos-delay="300">	
				<div id="img-container">
					@if ($product->productGallery()->first())
					<img src="{{ asset('images/products/'.$product->productGallery()->first()->picture) }}" class="img-fluid img gallery__img" id="img-view" alt="" />
					@endif
				</div>
				<div class="d-flex flex-wrap">
					@foreach( $product->productGallery()->get() as $product_gallery )
					<img src="{{ asset('images/products/'.$product_gallery->picture) }}" class="img-fluid img-thumbnail m-1 img-target" width="50" style="cursor: pointer;" />
					@endforeach
				</div>
				
			</div>
			<div class="col-xl-1"></div>
		</div>
	</div>
</section>

@endsection

@section('script')
<script src="{{ asset('js/jquery.zoom.min.js') }}"></script>

<script>

	$(document).ready(function () {

		$("#add-to-cart").submit(function (e) {

			$("#btn-submit").attr("disabled", true);

			Swal.fire({
				icon: 'success',
				title: 'Sukses!',
				text: 'Produk berhasil ditambahkan!',
				timer: 1000,
				showCancelButton: false,
				showConfirmButton: false
			}).then(
			function () {
				location.reload();
			});
		});

		$(".img-target").on("click", function () {
			$('.zoomImg').remove();
			$("#img-view").attr("src", $(this).attr('src'));
			$('#img-container').zoom();
		});

		$('#img-container').zoom();
	});

</script>
@endsection