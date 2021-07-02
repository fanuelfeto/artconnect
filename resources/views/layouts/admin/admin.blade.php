<!doctype html>
<html lang="en">
 <head>
 <!-- Required meta tags -->
	 <meta charset="utf-8">
	 <meta name="viewport" content="width=device-width, initial-scale=1">

	 <!-- CoreUI CSS -->
	 <link rel="stylesheet" href="https://unpkg.com/@coreui/coreui/dist/css/coreui.min.css" crossorigin="anonymous">

 	<title>@yield('title') | Artconnect</title>
 </head>
 <body class="c-app">
  <div class="c-sidebar c-sidebar-dark c-sidebar-show">
  	@include('layouts.admin.admin_sidebar')
  </div>
  <div class="c-wrapper c-fixed-components">
    <header class="c-header c-header-light c-header-fixed c-header-with-subheader">
      @include('layouts.admin.admin_navbar')
    </header>
    <div class="c-body pl-3">
      <main class="c-main">
        @yield('content')
      </main>
    </div>
    <footer class="c-footer">
      @include('layouts.admin.admin_footer')
    </footer>
  </div>
</body>
 <script src="https://unpkg.com/@popperjs/core@2"></script>
 <script src="https://unpkg.com/@coreui/coreui/dist/js/coreui.min.js"></script>
 </body>
</html>