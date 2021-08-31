@extends('layouts.admin.admin')
@section('title','Products')

@section('content')
<div class="container-fluid">
	<div class="fade-in">
		
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
				<li class="breadcrumb-item"><a href="{{ route('admin.product.index') }}">Product</a></li>
				<li class="breadcrumb-item active" aria-current="page">Add New Product</li>
			</ol>
		</nav>

		<form method="POST" action="{{ route('admin.product.create') }}" enctype="multipart/form-data">
			@csrf

			<div class="form-group">
				<label for="product_category_id">Product's Category <span class="font-weight-bold text-danger">*</span></label>
				<select class="form-control" id="product_category_id" name="product_category_id" required>
					<option value="" disabled selected>- Choose Category -</option>
					@foreach ($product_categories as $product_category)
					<option value="{{ $product_category->id }}">{{ $product_category->name }}</option>
					@endforeach
				</select>
			</div>

			<div class="form-group">
				<label for="name">Name <span class="font-weight-bold text-danger">*</span></label>
				<input type="text" class="form-control" id="name" name="name" placeholder="Type the title of the product" value="{{ old('name') }}" required />
			</div>
			<div class="form-group">
				<label for="description">Description <span class="font-weight-bold text-danger">*</span></label>
				<textarea class="form-control" id="description" name="description" rows="3" placeholder="Type the details of your item here" required>{{ old('description') }}</textarea>
			</div>
			<div class="form-group">
				<label for="width">Width (cm)<span class="font-weight-bold text-danger">*</span></label>
				<input type="number" class="form-control" id="width" name="width" placeholder="Type the width of the product" min="0" value="{{ old('width') }}" required />
			</div>
			<div class="form-group">
			<label for="height">Height (cm)<span class="font-weight-bold text-danger">*</span></label>
				<input type="number" class="form-control" id="height" name="height" placeholder="Type the height of the product" min="0" value="{{ old('height') }}" required />
			</div>
			<div class="form-group">
				<label for="price">Price <span class="font-weight-bold text-danger">*</span></label>
				<input type="number" class="form-control" id="price" name="price" placeholder="Type the price of the product" min="0" value="{{ old('price') }}" required />
			</div>
			<div class="form-group">
				<label for="picture">Choose Picture <span class="font-weight-bold text-danger">*</span></label>
				<input type="file" class="form-control-file" id="picture" name="picture" accept="image/*" required />
			</div>
			
			<button class="btn btn-primary my-5" type="submit">Publish</button>
		</form>
		
	</div>
</div>

@endsection