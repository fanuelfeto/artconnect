@extends('layouts.admin.admin_auth')
@section('title','Login')

@section('content')
<body class="c-app">
  <div class="c-sidebar">
    <!-- Sidebar content here -->
  </div>
  <div class="c-wrapper">
    <header class="c-header">
      <!-- Header content here -->
    </header>
    <div class="c-body">
      <main class="c-main">
        <div class="container">
		  <div class="row">
		    <div class="col-lg-8">
		      <div class="align-items-center justify-content-center">
		      	<img class="img-fluid" src="{{ assets('images/main-logo.jpg') }}" />
		      </div>
		    </div>
		    <div class="col-lg-4">
		      <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
		      	 <h5 class="card-title mb-1">Welcome!</h5>
		      	 <p class="card-text mb-2">Please sign in to your account</p>
		      	 <form method="POST" action="{{ route('admin.login') }}">
		      	 	{{ csrf_field() }}
				  <div class="form-group row">
				    <label for="email" class="col-sm-2 col-form-label">Email</label>
				    <div class="col-sm-10">
				      <input type="text" readonly class="form-control" name="email" id="email" value="email@example.com">
				    </div>
				  </div>
				  <div class="form-group row">
				    <label for="password" class="col-sm-2 col-form-label">Password</label>
				    <div class="col-sm-10">
				      <input type="password" class="form-control" id="password">
				    </div>
				  </div>
				  <button type="submit" class="btn btn-primary mb-2">Log in</button>
				</form>
		      </div>
		    </div>
		  </div>
		</div>
      </main>
    </div>
    <footer class="c-footer">
      <!-- Footer content here -->
    </footer>
  </div>
</body>
@endsection