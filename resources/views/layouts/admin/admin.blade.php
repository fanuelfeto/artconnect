<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Bootstrap icons -->
	<link rel="stylesheet" href="https://unpkg.com/@coreui/icons@2.0.0-beta.3/css/all.min.css">

	<!-- CoreUI CSS v4.0.1 -->
	<!-- <link rel="stylesheet" href="https://unpkg.com/@coreui/coreui@4.0.1/dist/css/coreui.min.css" crossorigin="anonymous"> -->

	<!-- CoreUI CSS v3.4.0 -->
	<link rel="stylesheet" href="https://unpkg.com/@coreui/coreui@3.4.0/dist/css/coreui.min.css" crossorigin="anonymous">

	<title>@yield('title') | Artconnect</title>

</head>
<body class="c-app">
	<div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">
		@include('layouts.admin.admin_sidebar')
	</div>
	<div class="c-wrapper c-fixed-components">
		<header class="c-header c-header-light c-header-fixed c-header-with-subheader">
			@include('layouts.admin.admin_header')
		</header>

		<div class="c-body">
			<main class="c-main">
				@yield('content')
			</main>
		</div>
		<footer class="c-footer">
			@include('layouts.admin.admin_footer')
		</footer>
	</div>
	<script src="https://unpkg.com/@coreui/coreui@3.4.0/dist/js/coreui.bundle.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	@yield('script')
</body>
</html>