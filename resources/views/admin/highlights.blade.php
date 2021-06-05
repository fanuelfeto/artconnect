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
      <main class="c-main">
        <div class="row">
       <div class="card" style="width: 18rem; margin-right:10px;">
        <svg class="bd-placeholder-img card-img-top" width="100%" height="180" xmlns="http://www.w3.org/2000/svg" aria-label="Placeholder: Image cap" preserveAspectRatio="xMidYMid slice" role="img"><title>Placeholder</title><rect width="100%" height="100%" fill="#868e96"/><text x="50%" y="50%" fill="#dee2e6" dy=".3em">Image cap</text></svg>

        <div class="card-body">
          <h5 class="card-title">Card title</h5>
          <p class="card-text">Quick sample text to create the card title and make up the body of the card's content.</p>
          <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
      </div>

      <div class="card" style="width: 18rem; margin-right:10px;">
        <svg class="bd-placeholder-img card-img-top" width="100%" height="180" xmlns="http://www.w3.org/2000/svg" aria-label="Placeholder: Image cap" preserveAspectRatio="xMidYMid slice" role="img"><title>Placeholder</title><rect width="100%" height="100%" fill="#868e96"/><text x="50%" y="50%" fill="#dee2e6" dy=".3em">Image cap</text></svg>

        <div class="card-body">
          <h5 class="card-title">Card title</h5>
          <p class="card-text">Quick sample text to create the card title and make up the body of the card's content.</p>
          <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
      </div>

      <div class="card" style="width: 18rem; margin-right:10px;">
        <svg class="bd-placeholder-img card-img-top" width="100%" height="180" xmlns="http://www.w3.org/2000/svg" aria-label="Placeholder: Image cap" preserveAspectRatio="xMidYMid slice" role="img"><title>Placeholder</title><rect width="100%" height="100%" fill="#868e96"/><text x="50%" y="50%" fill="#dee2e6" dy=".3em">Image cap</text></svg>

        <div class="card-body">
          <h5 class="card-title">Card title</h5>
          <p class="card-text">Quick sample text to create the card title and make up the body of the card's content.</p>
          <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
      </div>
    </div>
      </main>
    </div>
  </div>
</body>
@endsection