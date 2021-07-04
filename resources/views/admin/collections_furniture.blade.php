@extends('layouts.admin.admin')
@section('title','Furniture')
@section('content')
<header class="c-header">
	<div class="c-subheader px-3">
          <!-- Breadcrumb-->
    	<ol class="breadcrumb border-0 m-0">
        	<li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item"><a href="#">Admin</a></li>
            <li class="breadcrumb-item">Dashboard</li>
            <li class="breadcrumb-item active">Furniture</li>
            <!-- Breadcrumb Menu-->
        </ol>
     </div>
</header>
<a href="{{ route('admin.showFurnitureForm') }}" class="btn btn-success mb-3">Add New Item</a>
<div class="card">
  <div class="card-header"><i class="fa fa-align-justify"></i>Item Details</div>
  <div class="card-body">
    <table class="table table-responsive-sm">
    <!--<table class="table table-bordered table-striped">-->
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
      @foreach( $collection_items as $collection_item )
      <tbody>
        <tr>
          <td>{{ $collection_item->name }}</td>
          <td>{{ $collection_item->description }}</td>
          <td>{{ $collection_item->size }}</td>
          <td>{{ $collection_item->price }}</td>
          <td>
            <img width="100" src="{{ asset('images/collections/furniture/'.$collection_item->picture1) }}"><br>
            <img width="100" src="{{ asset('images/collections/furniture/'.$collection_item->picture2) }}"><br>
            <img width="100" src="{{ asset('images/collections/furniture/'.$collection_item->picture3) }}"><br>
          </td>
          <td>
            <a class="btn btn-success" href="{{ route('admin.showFurnitureEditForm',['id' => $collection_item->id]) }}">Edit</a>
            <a href="{{ route('admin.deleteFurniture',['id' => $collection_item->id]) }}" onclick="return confirm('Are sure want to delete this highlight?')"><button class="btn btn-danger">Delete</button></a>
          </td>
        </tr>
      </tbody>
      @endforeach
    </table>
  </div>
</div>
@endsection