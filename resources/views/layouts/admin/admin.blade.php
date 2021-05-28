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
 <body class="c-app container-fluid">
  <div class="c-sidebar">
  	
  </div>
  <div class="c-wrapper">
    <header class="c-header">
      @include('layouts.admin.admin_navbar')
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
</body>
 <!-- Optional JavaScript -->
 <!-- Popper.js first, then CoreUI JS -->
 <script src="https://unpkg.com/@popperjs/core@2"></script>
 <script src="https://unpkg.com/@coreui/coreui/dist/js/coreui.min.js"></script>
 </body>
</html>