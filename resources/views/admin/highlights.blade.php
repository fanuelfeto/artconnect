@extends('layouts.admin.admin')
@section('title','Highlights')
@section('content')
<body class="c-app">
  <div class="c-wrapper">
    <header class="c-header">
      <div>
      <a href="{{ route('admin.showHighlightsForm') }}" class="btn btn-success">Add New Highlight</a>
      </div>
    </header>
    <div class="c-body pl-3">
      @foreach($highlight_items as $highlight_item)
      <main class="c-main">
      <div class="row">
        <div class="card" style="width: 18rem; margin-right:10px;">
          <img class="bd-placeholder-img card-img-top" width="100%" height="180" aria-label="Placeholder: Image cap" preserveAspectRatio="xMidYMid slice" role="img" src="{{ asset('images/highlights/'.$highlight_item->picture1) }}">

          <div class="card-body">
            <h5 class="card-title">{{ $highlight_item->title }}</h5>
            <p class="card-text">{{ $highlight_item->content }}</p>
            <a href="{{ route('admin.highlightDetails',['id' => $highlight_item->id]) }}" class="btn btn-primary">See details</a>
          </div>
        </div>
      </div>
      </main>
      @endforeach
    </div>
  </div>
</body>
@endsection