
@extends("layouts.front_layouts.front_layout")
@section('title',$cmsPageDetails['title'])
@section("content")
<div class="span9">
    <ul class="breadcrumb">
		<li><a href="index.html">Home</a> <span class="divider">/</span></li>
		<li class="active">{{$cmsPageDetails['title']}}</li>
    </ul>
	<h3> {{$cmsPageDetails['title']}}</h3>	
	<p>
	<?php echo nl2br($cmsPageDetails['description']); ?>
    </p>
@endsection
