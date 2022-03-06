<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="csrf-token" content="{{ csrf_token() }}" />
	<title>Online Store BD</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	
	<!-- Front style -->
	<link id="callCss" rel="stylesheet" href="{{asset('front/css/front.min.css')}}" media="screen"/>
	<link href="{{asset('front/css/base.css')}}" rel="stylesheet" media="screen"/>
	<!-- Front style responsive -->
	<link href="{{asset('front/css/front-responsive.min.css')}}" rel="stylesheet"/>
	<link href="{{asset('front/css/font-awesome.css')}}" rel="stylesheet" type="text/css">
	<!-- Google-code-prettify -->
	<link href="{{asset('front/js/google-code-prettify/prettify.css')}}" rel="stylesheet"/>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" type="text/css">
	<!-- fav and touch icons -->
	<link rel="shortcut icon" href="{{asset('front/images/ico/favicon.ico')}}">
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{asset('front/images/ico/apple-touch-icon-144-precomposed.png')}}">
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{asset('front/images/ico/apple-touch-icon-114-precomposed.png')}}">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{asset('front/images/ico/apple-touch-icon-72-precomposed.png')}}">
	<link rel="apple-touch-icon-precomposed" href="{{asset('front/images/ico/apple-touch-icon-57-precomposed.png')}}">
	<style type="text/css" id="enject"></style>
	@yield("front_css")
</head>
<body>

@include("layouts.front_layouts.front_header")
<!-- Header End====================================================================== -->

@include('front.banners.home_page_banners')
<div id="mainBody">
	<div class="container">
		<div class="row">
			<!-- Sidebar ================================================== -->
			@include("layouts.front_layouts.front_sitebar")
			<!-- Sidebar end=============================================== -->
			@yield("content")
		</div>
	</div>
</div>
<!-- Footer ================================================================== -->
@include("layouts.front_layouts.front_footer")
<!-- Placed at the end of the document so the pages load faster ============================================= -->
<script src="{{asset('front/js/jquery.js')}}" type="text/javascript"></script>
<script src="{{asset('front/js/front.min.js')}}" type="text/javascript"></script>
<script src="{{asset('front/js/google-code-prettify/prettify.js')}}"></script>
<script src="{{asset('front/js/front.js')}}"></script>
<script src="{{asset('front/js/jquery.lightbox-0.5.js')}}"></script>
<script src="{{asset('front/js/front_custom.js')}}"></script>
<script src="{{asset('front/js/jquery.validate.js')}}"></script>
@yield("front_js")
</body>
</html>