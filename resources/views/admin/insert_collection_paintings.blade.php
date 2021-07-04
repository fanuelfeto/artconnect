@extends('layouts.admin.admin')
@section('title','Input Item')
@section('content')
<form method="POST" action="{{ route('admin.createPaintings') }}" enctype="multipart/form-data">
  @csrf 
  <div class="form-group">
    <label for="name">Name</label>
      <input type="text" class="form-control" id="name" name="name" placeholder="Type the title of the product">
  </div>
  <div class="form-group">
    <label for="description">Description</label>
      <textarea class="form-control" id="description" name="description" rows="3" placeholder="Type the details of your item here"></textarea>
  </div>
  <div class="form-group">
    <label for="size">Size</label>
      <input type="text" class="form-control" id="size" name="size" placeholder="Type the size of the product">
  </div>
  <div class="form-group">
    <label for="price">Price</label>
      <input type="text" class="form-control" id="price" name="price" placeholder="Type the price of the product">
  </div>
  <div class="form-group">
    <label for="picture1">Choose first picture...</label>
      <input type="file" class="form-control-file" id="picture1" name="picture1" accept="image/*">
  </div>
  <div class="form-group">
    <label for="picture2">Choose second picture...</label>
      <input type="file" class="form-control-file" id="picture2" name="picture2" accept="image/*">
  </div>
  <div class="form-group">
    <label for="picture3">Choose third picture...</label>
      <input type="file" class="form-control-file" id="picture3" name="picture3" accept="image/*">
  </div>
  <button class="btn btn-primary mt-5" type="submit">Publish</button>
</form>
@endsection