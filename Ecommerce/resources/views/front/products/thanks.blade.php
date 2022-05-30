@extends("layouts.front_layouts.front_layout")
@section("content")
<div class="span9">
  <ul class="breadcrumb">
  <li><a href="index.html">Home</a> <span class="divider">/</span></li>
  <li class="active"> Thanks</li>
  </ul>
<h3>Thanks </h3>
<hr class="soft"/>
    <div style="align:center;">
        <h3>Your Order Has Been Placed Successfully</h3>
        <p>Your Order Number is {{Session::get('order_id')}} and Grand Totanl is Taka {{Session::get('grand_total')}}</p>
    </div>
</div>
@endsection
<?php
 Session::forget('grand_total');
 Session::forget('couponAmount');
 Session::forget('order_id');
 ?>