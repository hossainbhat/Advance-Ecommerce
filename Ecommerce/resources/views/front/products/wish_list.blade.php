<?php 
use App\Models\Product; 
?>
@extends("layouts.front_layouts.front_layout")
@section('title','Wishlist')
@section("content")
<div class="span9">
  <ul class="breadcrumb">
  <li><a href="index.html">Home</a> <span class="divider">/</span></li>
  <li class="active"> Wishlist</li>
  </ul>
    <h3>  Wishlist [ <small><span class="totalWishlisttems">{{ (totalWishlisttems())}}</span> Item(s) </small>]<a href="{{url('/')}}" class="btn btn-large pull-right"><i class="icon-arrow-left"></i> Continue Shopping </a></h3>
    <hr class="soft"/>


    <div id="appentWishlistItems">
        @include('front.products.wishlist_item')
    </div>

    <a href="{{url('/')}}" class="btn btn-large"><i class="icon-arrow-left"></i> Continue Shopping </a>

</div>
@endsection 
