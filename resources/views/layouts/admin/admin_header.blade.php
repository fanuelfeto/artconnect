<button class="c-header-toggler c-class-toggler d-lg-none mfe-auto" type="button" data-target="#sidebar" data-class="c-sidebar-show">
	<i class="c-icon c-icon-lg cil-menu"></i>
</button>

<a class="c-header-brand d-lg-none" href="#">
	<img src="{{ asset('images/main-logo.jpeg') }}" width="118" height="46">
</a>

<button class="c-header-toggler c-class-toggler mfs-3 d-md-down-none" type="button" data-target="#sidebar" data-class="c-sidebar-lg-show" responsive="true">
	<i class="c-icon c-icon-lg cil-menu"></i>
</button>

<!-- <ul class="c-header-nav d-md-down-none">
	<li class="c-header-nav-item px-3"><a class="c-header-nav-link" href="#">Dashboard</a></li>
	<li class="c-header-nav-item px-3"><a class="c-header-nav-link" href="#">Users</a></li>
	<li class="c-header-nav-item px-3"><a class="c-header-nav-link" href="#">Settings</a></li>
</ul> -->

<ul class="c-header-nav ml-auto mr-4">
	<!-- <li class="c-header-nav-item d-md-down-none mx-2">
		<a class="c-header-nav-link" href="#">
			<i class="c-icon cil-bell"></i>
		</a>
	</li> -->
	<li class="c-header-nav-item dropdown">
		<a class="c-header-nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
			<div class="c-avatar">
				<img class="c-avatar-img" src="https://friconix.com/png/fi-cnsuxl-user-circle.png" alt="user@email.com">
			</div>
		</a>
		<div class="dropdown-menu dropdown-menu-right pt-0">
			<div class="dropdown-header bg-light py-2"><strong>Settings</strong></div>
			<a class="dropdown-item" href="#" onclick="event.preventDefault();document.querySelector('#logout-form').submit();">
				<i class="c-icon mr-2 cil-account-logout"></i>
				Logout
			</a>
			<form id="logout-form" action="{{ route('admin.logout') }}" method="POST" hidden>
				@csrf
			</form>
		</div>
	</li>
</ul>
