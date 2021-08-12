<div class="c-sidebar-brand d-lg-down">
	<img src="{{ asset('images/main-logo.jpeg') }}" class="c-sidebar-brand-full" width="70" height="46" />
	<img src="{{ asset('images/main-logo.jpeg') }}" class="c-sidebar-brand-minimized" width="46" height="46" />
</div>
<ul class="c-sidebar-nav">
	
	<li class="c-sidebar-nav-item">
		<a class="c-sidebar-nav-link {{ Request::segment(2) === 'dashboard' ? 'c-active' : null }}" href="{{ route('admin.dashboard') }}">
			<i class="c-sidebar-nav-icon cil-speedometer"></i>
			Dashboard
		</a>
	</li>

	<li class="c-sidebar-nav-title">Products Management</li>

	<li class="c-sidebar-nav-item">
		<a class="c-sidebar-nav-link {{ Request::segment(3) === 'all' ? 'c-active' : null }}" href="{{ route('admin.product.index') }}">
			<i class="c-sidebar-nav-icon cil-list"></i>
			All Products
		</a>
	</li>

	<li class="c-sidebar-nav-item">
		<a class="c-sidebar-nav-link {{ Request::segment(3) === 'home-accessories' ? 'c-active' : null }}" href="{{ route('admin.product.showHomeAccessories') }}">
			<i class="c-sidebar-nav-icon cil-3d"></i>
			Home Accessories
		</a>
	</li>

	<li class="c-sidebar-nav-item">
		<a class="c-sidebar-nav-link {{ Request::segment(3) === 'furnitures' ? 'c-active' : null }}" href="{{ route('admin.product.showFurnitures') }}">
			<i class="c-sidebar-nav-icon cil-bed"></i>
			Furnitures
		</a>
	</li>

	<li class="c-sidebar-nav-item">
		<a class="c-sidebar-nav-link {{ Request::segment(3) === 'paintings' ? 'c-active' : null }}" href="{{ route('admin.product.showPaintings') }}">
			<i class="c-sidebar-nav-icon cil-filter-photo"></i>
		Paintings
		</a>
	</li>

	<li class="c-sidebar-nav-item">
		<a class="c-sidebar-nav-link {{ Request::segment(3) === 'sculptures' ? 'c-active' : null }}" href="{{ route('admin.product.showSculptures') }}">
			<i class="c-sidebar-nav-icon cil-user-female"></i>
			Sculptures
		</a>
	</li>

	<li class="c-sidebar-nav-item">
		<a class="c-sidebar-nav-link {{ Request::segment(4) === 'orders' ? 'c-active' : null }}" href="{{ route('admin.product.showOrders') }}">
			<i class="c-sidebar-nav-icon"></i>
			Orders
		</a>
	</li>


</ul>
<button class="c-sidebar-minimizer c-class-toggler" type="button" data-target="_parent" data-class="c-sidebar-minimized"></button>