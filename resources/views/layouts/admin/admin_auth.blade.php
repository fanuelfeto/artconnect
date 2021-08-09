<!DOCTYPE html>
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
	<div class="c-wrapper">
		<div class="c-body">
			<main class="c-main">
				@yield('content')
			</main>
		</div>
	</div>
	<script src="https://unpkg.com/@popperjs/core@2"></script>
	<script src="https://unpkg.com/@coreui/coreui/dist/js/coreui.min.js"></script>
</body>
</html>