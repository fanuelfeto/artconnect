@extends('layouts.admin.admin')
@section('title','Highlights')
@section('content')
<body class="c-app">
  <div class="c-wrapper">
    <div class="c-body pl-3">
      <table class="table table-bordered table-striped">
          <thead>
            <tr>
              <th width="1%">Title</th>
              <th>Content</th>
              <th width="1%">Pictures</th>
              <th width="1%">Action</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>{{ $highlight_details->title }}</td>
              <td>{{ $highlight_details->content }}</td>
              <td><img width="150px" src="{{ asset('images/highlights/'.$highlight_details->picture1) }}"><br>
                <img width="150px" src="{{ asset('images/highlights/'.$highlight_details->picture2) }}"><br>
                <img width="150px" src="{{ asset('images/highlights/'.$highlight_details->picture3) }}"><br>
                <img width="150px" src="{{ asset('images/highlights/'.$highlight_details->picture4) }}">
              </td>
              <td>
                <a class="btn btn-success" href="{{ route('admin.showEditHighlightForm',['id' => $highlight_details->id]) }}">Edit</a>
                <a class="btn btn-danger" href="#">Delete</a></td>
            </tr>
          </tbody>
        </table>
    </div>
  </div>
</body>
@endsection