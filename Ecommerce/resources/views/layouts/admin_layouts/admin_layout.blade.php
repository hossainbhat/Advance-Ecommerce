<!doctype html>
<html lang="en" class="color-sidebar sidebarcolor6">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<!--favicon-->
	<link rel="icon" href="{{asset('backEnd/images/favicon-32x32.png')}}" type="image/png" />
	@include("layouts.admin_layouts.header_script")
	@yield("script_css")
	<title>{{ config('app.name') }} | @yield('title') </title>
</head>

<body>
	<!--wrapper-->
	<div class="wrapper">
		<!--sidebar wrapper -->
        @include("layouts.admin_layouts.admin_sitebar")
		<!--end sidebar wrapper -->
		<!--start header -->
		@include("layouts.admin_layouts.admin_header")
		<!--end header -->
		<!--start page wrapper -->
		@yield("content")
		<!--end page wrapper -->
		<!--start overlay-->
		<div class="overlay toggle-icon"></div>
		<!--end overlay-->
		<!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
		<!--End Back To Top Button-->
        @include("layouts.admin_layouts.admin_footer")
	</div>
	<!--end wrapper-->
	<!-- Bootstrap JS -->
	@include("layouts.admin_layouts.footer_script")
	@yield("script_js")
</body>
</html>