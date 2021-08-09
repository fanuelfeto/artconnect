@extends('layouts.admin.admin')
@section('title','Gallery')

@section('content')
<div class="container-fluid">
	<div class="fade-in">

		@include('components.alerts')

		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
				<li class="breadcrumb-item"><a href="{{ route('admin.product.index') }}">Product</a></li>
				<li class="breadcrumb-item active" aria-current="page">Gallery</li>
			</ol>
		</nav>

		<div class="card">
			<div class="card-header">
				<h4>{{ $product->name }}</h4>
				<p>{{ $product->description }}</p>

				<div class="border p-3 rounded">
					<form method="POST" action="{{ route('admin.product.createGallery') }}" enctype="multipart/form-data">
						@csrf
						<input type="hidden" class="form-control" name="product_id" value="{{ $product->id }}" readonly required hidden>
						<div class="form-group">
							<label for="picture">Choose Picture <span class="font-weight-bold text-danger">*</span></label>
							<input type="file" class="form-control-file" id="picture" name="picture" accept="image/*" required />
						</div>
						<button class="btn btn-success" type="submit">Add Gallery</button>
					</form>
				</div>
			</div>
			<div class="card-body">
				<div class="d-flex flex-wrap">
					@forelse ($product->productGallery()->get() as $product_gallery)
					<div class="position-relative border m-2">
						<img src="{{ asset('images/products/'.$product_gallery->picture) }}" width="200">
						<button data-id="{{ $product_gallery->id }}" class="position-absolute close border rounded-circle bg-dark delete" style="top: 4px; right: 4px; width: 1.5rem; height: 1.5rem;"><strong>&times;</strong></button>
					</div>
					@empty
					@endforelse
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
			text: "Apakah Anda yakin ingin menghapus foto ini?",
			icon: "warning",
			showCancelButton: true,
			confirmButtonText: "Ya, hapus foto ini!",
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
					url: "{{ route('admin.product.deleteGallery') }}",
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