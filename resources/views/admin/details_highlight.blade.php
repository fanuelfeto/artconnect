@extends('layouts.admin.admin')
@section('title','Highlights')
@section('content')
<header class="c-header mb-3">
  <div class="c-subheader px-3">
    <!-- Breadcrumb-->
    <ol class="breadcrumb border-0 m-0">
      <li class="breadcrumb-item">Home</li>
      <li class="breadcrumb-item"><a href="#">Admin</a></li>
      <li class="breadcrumb-item active">Dashboard</li>
    <!-- Breadcrumb Menu-->
    </ol>
  </div>
</header>
<div class="card">
  <div class="card-header"><i class="fa fa-align-justify"></i>Highlight Details</div>
  <div class="card-body">
    <table class="table table-responsive-sm">
    <!--<table class="table table-bordered table-striped">-->
      <thead>
        <tr>
          <th width="1%">Title</th>
          <th width="1.5%">Content</th>
          <th width="1%">Pictures</th>
          <th width="1%">Action</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>{{ $highlight_details->title }}</td>
          <td>{{ $highlight_details->content }}</td>
          <td>
            <img width="100" src="{{ asset('images/highlights/'.$highlight_details->picture1) }}"><br>
            <img width="100" src="{{ asset('images/highlights/'.$highlight_details->picture2) }}"><br>
            <img width="100" src="{{ asset('images/highlights/'.$highlight_details->picture3) }}"><br>
            <img width="100" src="{{ asset('images/highlights/'.$highlight_details->picture4) }}">
          </td>
          <td>
            <a class="btn btn-success" href="{{ route('admin.showEditHighlightForm',['id' => $highlight_details->id]) }}">Edit</a>
            <a href="{{ route('admin.deleteHighlight',['id' => $highlight_details->id]) }}" onclick="return confirm('Are sure want to delete this highlight?')"><button class="btn btn-danger">Delete</button></a>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
<script>
</script>
@endsection