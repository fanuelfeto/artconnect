@extends('layouts.admin.admin')
@section('title','Products')

@section('content')
<div class="container-fluid">
	<div class="fade-in">
		
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
				<li class="breadcrumb-item"><a href="{{ route('admin.product.index') }}">Product</a></li>
				<li class="breadcrumb-item active" aria-current="page">Edit Product</li>
			</ol>
		</nav>

		<form method="POST" action="{{ route('admin.product.update') }}" enctype="multipart/form-data">
			@csrf

			<input type="hidden" class="form-control" name="id" value="{{ $product->id }}" readonly required hidden>

			<div class="form-group">
				<label for="product_category_id">Product's Category <span class="font-weight-bold text-danger">*</span></label>
				<select class="form-control" id="product_category_id" name="product_category_id" required>
					<option value="" disabled selected>- Choose Category -</option>
					@foreach ($product_categories as $product_category)
					<option value="{{ $product_category->id }}" {{ $product->product_category_id == $product_category->id ? 'selected' : '' }}>{{ $product_category->name }}</option>
					@endforeach
				</select>
			</div>

			<div class="form-group">
				<label for="name">Name <span class="font-weight-bold text-danger">*</span></label>
				<input type="text" class="form-control" id="name" name="name" placeholder="Type the title of the product" value="{{ $product->name }}" required />
			</div>
			<div class="form-group">
				<label for="description">Description <span class="font-weight-bold text-danger">*</span></label>
				<textarea class="form-control" id="description" name="description" rows="3" placeholder="Type the details of your item here" required>{{ $product->description }}</textarea>
			</div>
			<div class="form-group">
				<label for="size">Size <span class="font-weight-bold text-danger">*</span></label>
				<input type="number" class="form-control" id="size" name="size" placeholder="Type the size of the product" min="0" value="{{ $product->size }}" required />
			</div>
			<div class="form-group">
				<label for="price">Price <span class="font-weight-bold text-danger">*</span></label>
				<input type="number" class="form-control" id="price" name="price" placeholder="Type the price of the product" min="0" value="{{ $product->price }}" required />
			</div>
			
			<button class="btn btn-success my-5" type="submit">Update</button>
		</form>
		
	</div>
</div>

@endsection