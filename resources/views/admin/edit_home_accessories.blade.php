@extends('layouts.admin.admin')
@section('title',"Edit Home Accesories's Item")
@section('content')
<body class="c-app">
  <div class="c-wrapper">
    <form method="POST" action="{{ route('admin.updateHomeAccessories') }}" enctype="multipart/form-data">
      @csrf 
      
      <input type="hidden" name="id" value="{{ $product->id }}" readonly required hidden>

      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Type the title of your product" value="{{ $product->name }}">
      </div>
      <div class="form-group">
        <label for="description">Description</label>
        <textarea class="form-control" id="description" name="description" rows="3" placeholder="Type the details of your item here">{{ $product->description }}</textarea>
      </div>
       <div class="form-group">
        <label for="size">Size</label>
          <input type="text" class="form-control" id="size" name="size" placeholder="Type the size of the product" value="{{ $product->size }}">
      </div>
      <div class="form-group">
        <label for="price">Price</label>
          <input type="text" class="form-control" id="price" name="price" placeholder="Type the price of the product" value="{{ $product->price }}">
      </div>
      @foreach( $product->productGallery()->get() as $product_gallery )
       <div class="form-group">
        <label for="picture1">{{ $product_gallery->picture }}</label>
        <input type="file" class="form-control-file" id="{{ $product_gallery->id }}" name="{{ $product_gallery->picture }}" accept="image/*">
      </div>
      @endforeach
      <button class="btn btn-primary mt-5" type="submit">Update</button>
    </form>
  </div>
</body>
@endsection