@extends('layouts.admin.admin')
@section('title',"Edit Paintings's Item")
@section('content')
<body class="c-app">
  <div class="c-wrapper">
    <form method="POST" action="{{ route('admin.updatePaintings') }}" enctype="multipart/form-data">
      @csrf 
  
      <input type="hidden" name="id" value="{{ $collection_item->id }}" readonly requried hidden>

      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Type the title of your product" value="{{ $collection_item->name }}">
      </div>
      <div class="form-group">
        <label for="description">Description</label>
        <textarea class="form-control" id="description" name="description" rows="3" placeholder="Type the details of your item here">{{ $collection_item->description }}</textarea>
      </div>
       <div class="form-group">
        <label for="size">Size</label>
          <input type="text" class="form-control" id="size" name="size" placeholder="Type the size of the product" value="{{ $collection_item->size }}">
      </div>
      <div class="form-group">
        <label for="price">Price</label>
          <input type="text" class="form-control" id="price" name="price" placeholder="Type the price of the product" value="{{ $collection_item->price }}">
      </div>
       <div class="form-group">
        <label for="picture1">{{ $collection_item->picture1 }}</label>
        <input type="file" class="form-control-file" id="picture1" name="picture1" accept="image/*">
      </div>
      <div class="form-group">
        <label for="picture2">{{ $collection_item->picture2 }}</label>
        <input type="file" class="form-control-file" id="picture2" name="picture2" accept="image/*">
      </div>
      <div class="form-group">
        <label for="picture3">{{ $collection_item->picture3 }}</label>
        <input type="file" class="form-control-file" id="picture3" name="picture3" accept="image/*">
      </div>
      <button class="btn btn-primary mt-5" type="submit">Update</button>
    </form>
  </div>
</body>
@endsection