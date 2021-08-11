@extends('layouts.admin.admin_auth')
@section('title','Login')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-6">
			<div class="card mx-4">
				<div class="card-body p-4">
					<div class="text-center">
						<img src="{{ asset('images/main-logo.jpeg') }}" class="img-fluid mb-3" width="200">
					</div>
					
					<h1>Admin Login</h1>
					<p class="text-muted">Login your account</p>
					
					<form method="POST" action="{{ url('admin/post-login') }}">
						@csrf
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text">
									<i class="c-icon cil-envelope-open"></i>
								</span>
							</div>
							<input type="email" class="form-control form-control-lg" name="email" id="email" placeholder="Email" required />
						</div>
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text">
									<i class="c-icon cil-lock-locked"></i>
								</span>
							</div>
							<input type="password" class="form-control form-control-lg" name="password" id="password" placeholder="Password" required />
						</div>

						<button type="submit" class="btn btn-block btn-success btn-lg">Login</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection