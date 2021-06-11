@extends('layouts.admin.admin')
@section('title','Edit Highlight')
@section('content')
<body class="c-app">
  <div class="c-wrapper">
    <form method="POST" action="{{ route('admin.updateHighlight') }}" enctype="multipart/form-data">
      @csrf 
      
      <input type="hidden" name="id" value="{{ $highlight_item->id }}" readonly required hidden>

      <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" id="title" name="title" placeholder="Type the title of the highlight's product" value="{{ $highlight_item->title }}">
      </div>
      <div class="form-group">
        <label for="content">Content</label>
        <textarea class="form-control" id="content" name="content" rows="3" placeholder="Type the details of your highlights here">{{ $highlight_item->content }}</textarea>
      </div>
       <div class="form-group">
        <label for="picture1">{{ $highlight_item->picture1 }}</label>
        <input type="file" class="form-control-file" id="picture1" name="picture1" accept="image/*">
      </div>
      <div class="form-group">
        <label for="picture2">{{ $highlight_item->picture2 }}</label>
        <input type="file" class="form-control-file" id="picture2" name="picture2" accept="image/*">
      </div>
      <div class="form-group">
        <label for="picture3">{{ $highlight_item->picture3 }}</label>
        <input type="file" class="form-control-file" id="picture3" name="picture3" accept="image/*">
      </div>
      <div class="form-group">
        <label for="picture4">{{ $highlight_item->picture4 }}</label>
        <input type="file" class="form-control-file" id="picture4" name="picture4" accept="image/*">
      </div>
      <button class="btn btn-primary mt-5" type="submit">Update</button>
    </form>
  </div>
</body>
@endsection