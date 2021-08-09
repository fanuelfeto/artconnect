@if (session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
	<div class="alert-body">
		<i data-feather="check-circle"></i>
		<span><strong>Success!</strong> {{ session('success') ?? "" }}</span>
	</div>
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
</div>
@endif

@if (session('info'))
<div class="alert alert-info alert-dismissible fade show" role="alert">
	<div class="alert-body">
		<i data-feather="alert-circle"></i>
		<span><strong>Info!</strong> {{ session('info') ?? "" }}</span>
	</div>
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
</div>
@endif

@if (session('warning'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
	<div class="alert-body">
		<i data-feather="alert-triangle"></i>
		<span><strong>Warning!</strong> {{ session('warning') ?? "" }}</span>
	</div>
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
</div>
@endif

@if (session('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
	<div class="alert-body">
		<i data-feather="x-circle"></i>
		<span><strong>Error!</strong> {{ session('error') ?? "" }}</span>
	</div>
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
</div>
@endif