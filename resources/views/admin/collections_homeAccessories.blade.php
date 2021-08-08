@extends('layouts.admin.admin')
@section('title','Home Accessories')
@section('content')
<header class="c-header">
	<div class="c-subheader px-3">
          <!-- Breadcrumb-->
    	<ol class="breadcrumb border-0 m-0">
        	<li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item"><a href="#">Admin</a></li>
            <li class="breadcrumb-item">Dashboard</li>
            <li class="breadcrumb-item active">Home Accessories</li>
            <!-- Breadcrumb Menu-->
        </ol>
     </div>
</header>
<a href="{{ route('admin.showHomeAccessoriesForm') }}" class="btn btn-success mb-3">Add New Item</a>
<div class="card">
  <div class="card-header"><i class="fa fa-align-justify"></i>Item Details</div>
  <div class="card-body">
    <table class="table table-responsive-sm">
      <thead>
        <tr>
          <th width="1%">Name</th>
          <th width="1%">Description</th>
          <th width="1%">Size</th>
          <th width="1%">Price</th>
          <th width="1%">Pictures</th>
          <th width="1%">Action</th>
        </tr>
      </thead>
      @foreach( $products as $product )
      <tbody>
        <tr>
          <td>{{ $product->name }}</td>
          <td>{{ $product->description }}</td>
          <td>{{ $product->size }}</td>
          <td>{{ $product->price }}</td>
          <td>
            @foreach( $product->productGallery()->get() as $product_gallery )
            <img width="100" src="{{ asset('images/collections/home_accessories/'.$product_gallery->picture) }}"><br>
            @endforeach
          </td>
          <td>
            <a class="btn btn-success" href="{{ route('admin.showHomeAccessoriesEditForm',['id' => $product->id]) }}">Edit</a>
            <a href="{{ route('admin.deleteHomeAccessories',['id' => $product->id]) }}" onclick="return confirm('Are you sure want to delete this collection?')"><button class="btn btn-danger">Delete</button></a>
          </td>
        </tr>
      </tbody>
      @endforeach
    </table>
  </div>
</div>
@endsection