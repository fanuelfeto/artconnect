@extends('layouts.admin.admin')
@section('title','Products')

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

		<a href="{{ route('admin.product.create') }}" class="btn btn-success mb-3">Add New Item</a>

		<div class="card">
			<div class="card-header">
				<h4>Products</h4>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-hover">
						<thead class="thead-dark">
							<tr>
								<th>Name</th>
								<th>Description</th>
								<th>Width (cm)</th>
								<th>Height (cm)</th>
								<th>Price (IDR)</th>
								<th>Pictures</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
							@forelse ($products as $product)
							<tr>
								<td>{{ $product->name }}</td>
								<td>{{ $product->description }}</td>
								<td>{{ $product->width }}</td>
								<td>{{ $product->height }}</td>
								<td>{{ number_format($product->price, 0, '.', ',') }}</td>
								<td>
									@forelse( $product->productGallery()->get() as $product_gallery )
									<img width="50" src="{{ asset('images/products/'.$product_gallery->picture) }}" class="img-fluid rounded" style="margin: 1px;">
									@empty
									No picture
									@endforelse
								</td>
								<td>
									<a href="{{ route('admin.product.showGallery', ['id' => $product->id]) }}" class="btn btn-info">See Gallery</a>
									<a href="{{ route('admin.product.showEditForm', ['id' => $product->id]) }}" class="btn btn-success">Edit</a>
									<button data-id="{{ $product->id }}" class="btn btn-danger delete">Delete</button>
								</td>
							</tr>
							@empty
							<tr>
								<td colspan="6">Tidak ada produk.</td>
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

@section('script')
<script>
	$(document).on('click', '.delete', function () {
		var id = $(this).data('id');
		Swal.fire({
			title: "Perhatian!",
			text: "Apakah Anda yakin ingin menghapus produk ini?",
			icon: "warning",
			showCancelButton: true,
			confirmButtonText: "Ya, hapus produk ini!",
			confirmButtonClass: "btn btn-primary",
			cancelButtonClass: "btn btn-danger ml-2",
			cancelButtonText: "Batal",
			buttonsStyling: false,
		}).then(function (result)
		{
			if (result.value)
			{
				$.ajax({
					headers: {
						'X-CSRF-TOKEN': "{{ csrf_token() }}"
					},
					url: "{{ route('admin.product.delete') }}",
					method: "POST",
					data: {id:id},
					success: function (data)
					{
						Swal.fire(
						{
							icon: "success",
							title: "Success!",
							text: data,
							showConfirmButton: false,
						});

						setTimeout(function () {
							location.reload();
						}, 1500);
					},
					error: function ()
					{
						Swal.fire(
						{
							icon: "error",
							title: "Oops, something went wrong!",
							text: "Report to Developer if error keeps showing up!",
							confirmButtonClass: "btn btn-primary",
						});
					}
				});
			}
		})
	});
</script>
@endsection