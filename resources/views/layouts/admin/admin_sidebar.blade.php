<div class="c-sidebar-brand d-lg-down-none">
	<img src="{{ asset('images/main-logo.jpeg') }}" class="c-sidebar-brand-full" width="118" height="46" />
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
		<a class="c-sidebar-nav-link {{ Request::segment(3) === 'scultures' ? 'c-active' : null }}" href="{{ route('admin.product.showSculptures') }}">
			<i class="c-sidebar-nav-icon cil-user-female"></i>
			Scultures
		</a>
	</li>

	<!-- <li class="c-sidebar-nav-item c-sidebar-nav-dropdown">
		<a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">
			<i class="c-sidebar-nav-icon cil-list"></i>
			Dropdown Menu
		</a>
		<ul class="c-sidebar-nav-dropdown-items">
			<li class="c-sidebar-nav-item">
				<a class="c-sidebar-nav-link" href="#"><span class="c-sidebar-nav-icon"></span> Dropdown Item</a>
			</li>
		</ul>
	</li> -->
</ul>
<button class="c-sidebar-minimizer c-class-toggler" type="button" data-target="_parent" data-class="c-sidebar-minimized"></button>