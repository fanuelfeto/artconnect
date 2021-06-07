@extends('layouts.admin.admin')
@section('title','Input Highlights')
@section('content')
<form method="POST" action="{{ route('admin.createHighlights') }}" enctype="multipart/form-data">
  @csrf 
  <div class="form-group">
    <label for="title">Title</label>
    <input type="text" class="form-control" id="title" name="title" placeholder="Type the title of the highlight's product">
  </div>
  <div class="form-group">
    <label for="content">Content</label>
    <textarea class="form-control" id="content" name="content" rows="3" placeholder="Type the details of your highlights here"></textarea>
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
  <div class="form-group">
    <label for="picture4">Choose fourth picture...</label>
    <input type="file" class="form-control-file" id="picture4" name="picture4" accept="image/*">
  </div>
  <button class="btn btn-primary mt-5" type="submit">Publish</button>
</form>
@endsection