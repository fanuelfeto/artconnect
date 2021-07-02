@extends('layouts.admin.admin')
@section('title','Highlights')
@section('content')
    <header class="c-header">
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
    <div class="c-body">
      <main class="c-main">
      <a href="{{ route('admin.showHighlightsForm') }}" class="btn btn-success mb-3">Add New Highlight</a>
          @foreach($highlight_items as $highlight_item)
        <div class="fade-in">
          <div class="card" style="width: 18rem; margin-right:10px;">
            <img class="bd-placeholder-img card-img-top" width="100%" height="180" aria-label="Placeholder: Image cap" preserveAspectRatio="xMidYMid slice" role="img" src="{{ asset('images/highlights/'.$highlight_item->picture1) }}">

            <div class="card-body">
              <h5 class="card-title">{{ $highlight_item->title }}</h5>
              <p class="card-text">{{ $highlight_item->content }}</p>
              <a href="{{ route('admin.highlightDetails',['id' => $highlight_item->id]) }}" class="btn btn-primary">See details</a>
            </div>
          </div>
      </div>
          @endforeach
      </main>
    </div>
@endsection