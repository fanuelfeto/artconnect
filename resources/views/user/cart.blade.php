@extends('layouts.user.user')
@section('title','Cart')
@section('content')  
<!--================Home Banner Area =================-->
<section class="banner_area">
	<div class="banner_inner d-flex align-items-center">
		<div class="container">
			<div class="banner_content text-center mt-20 mb-20">
				<h3>Cart</h3>
			</div>
		</div>
	</div>
</section>
<!--================End Home Banner Area =================-->

<!--================Cart Area =================-->
<section class="cart_area mb-80">
	<div class="container">
		<div class="cart_inner">
			<form action="{{ route('updateCart') }}" method="post">
				@csrf
				<div class="table-responsive">
					<table class="table">
						<thead>
							<tr>
								<th scope="col">Product</th>
								<th></th>
								<th scope="col">Price</th>
								<th></th>
								<th scope="col">Drop Item</th>
							</tr>
						</thead>
						<tbody>
							@forelse ((array) $carts as $row)
							<tr>
								<td>
									<div class="media">
										@if ($row['collection_id'] == 1)
										<div class="d-flex">
											<img src="{{ asset('images/collections/home_accessories/' . $row['product_image']) }}" width="100px" height="100px" alt="{{ $row['product_name'] }}">
										</div>
										@elseif ($row['collection_id'] == 2)
										<div class="d-flex">
											<img src="{{ asset('images/collections/furniture/' . $row['product_image']) }}" width="100px" height="100px" alt="{{ $row['product_name'] }}">
										</div>
										@elseif ($row['collection_id'] == 3)
										<div class="d-flex">
											<img src="{{ asset('images/collections/paintings/' . $row['product_image']) }}" width="100px" height="100px" alt="{{ $row['product_name'] }}">
										</div>
										@elseif ($row['collection_id'] == 4)
										<div class="d-flex">
											<img src="{{ asset('images/collections/sculpture/' . $row['product_image']) }}" width="100px" height="100px" alt="{{ $row['product_name'] }}">
										</div>
										@else
										<div class="d-flex">
											<img src="{{ asset('images/highlights/' . $row['product_image']) }}" width="100px" height="100px" alt="{{ $row['product_name'] }}">
										</div>
										@endif
									</div>
								</td>
								<td>
									<div>
										<p>{{ $row['product_name'] }}</p>
									</div>
								</td>
								<td>
									<h5>Rp {{ number_format($row['product_price']) }}</h5>
								</td>
								<td></td>
								<td>
									<input type="hidden" class="product_id" value="{{ $row['product_id'] }}" />
									<a href="#" onclick="return confirm('Are sure want to cancel this order')" class="btn-danger delete_cart_data">Delete</a>
								</td>
							</tr>
							@empty
							<tr>
								<td colspan="4">Tidak ada belanjaan</td>
							</tr>
							@endforelse
						</form>
						<tr>
							<td>
								<h5>Subtotal</h5>
							</td>
							<td></td>
							<td>
								<h5>Rp {{ number_format($subtotal) }}</h5>
							</td>
							<td></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</section>

<script>
	$(document).ready(function () {

		$('.delete_cart_data').click(function (e) {
			e.preventDefault();

			var product_id = $(this).closest("td").find('.product_id').val();

			var data = {
				'_token': $('input[name=_token]').val(),
				"product_id": product_id,
			};


			$.ajax({
				url: "{{ route('deleteCart') }}",
				type: 'GET',
				data: data,
				success: function (response)
				{
					location.reload();
				}
			});
		});

	});

</script>
<!--================End Cart Area =================-->
@endsection