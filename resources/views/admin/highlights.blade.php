@extends('layouts.admin.admin')
@section('title','Input Highlights')
@section('content')
<form>
  <div class="form-group">
    <label for="title">Title</label>
    <input type="text" class="form-control" id="title" placeholder="Type the title of the highlight's product">
  </div>
  <div class="form-group">
    <label for="content">Content</label>
    <textarea class="form-control" id="content" rows="1" placeholder="Type the details of your highlights here"></textarea>
  </div>
  <div class="custom-file mt-3">
    <input type="file" class="custom-file-input" id="validatedCustomFile" required>
    <label class="custom-file-label" for="validatedCustomFile">Choose first picture...</label>
  </div>
  <div class="custom-file mt-3">
    <input type="file" class="custom-file-input" id="validatedCustomFile" required>
    <label class="custom-file-label" for="validatedCustomFile">Choose second picture...</label>
  </div>
  <div class="custom-file mt-3">
    <input type="file" class="custom-file-input" id="validatedCustomFile" required>
    <label class="custom-file-label" for="validatedCustomFile">Choose third picture...</label>
  </div>
  <div class="custom-file mt-3">
    <input type="file" class="custom-file-input" id="validatedCustomFile" required>
    <label class="custom-file-label" for="validatedCustomFile">Choose fourth picture...</label>
  </div>
  <button class="btn btn-primary mt-5" type="submit">Publish</button>
</form>
@endsection