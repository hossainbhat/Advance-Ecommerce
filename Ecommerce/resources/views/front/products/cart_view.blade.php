
@extends("layouts.front_layouts.front_layout")
@section("content")
<div class="span9">
  <ul class="breadcrumb">
  <li><a href="index.html">Home</a> <span class="divider">/</span></li>
  <li class="active"> SHOPPING CART</li>
  </ul>
<h3>  SHOPPING CART [ <small> <span class="totalCartItems">{{ totalCartItems() }} </span> Item(s) </small>]<a href="{{url('/')}}" class="btn btn-large pull-right"><i class="icon-arrow-left"></i> Continue Shopping </a></h3>
<hr class="soft"/>

@if(Session::has('success_message'))
     <div class="alert alert-success" role="alert">
       {{Session::get('success_message')}}
       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
         <span aria-hidden="true">&times;</span>
       </button>
     </div>
     <?php Session::forget('success_message') ?>
     @endif
     @if(Session::has('error_message'))
    <div class="alert alert-danger" role="alert">
      {{Session::get('error_message')}}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <?php Session::forget('error_message') ?>
    @endif

    <div id="AppendCartItems">
      @include("front.products.cart_items")
    </div>


<a href="{{url('/')}}" class="btn btn-large"><i class="icon-arrow-left"></i> Continue Shopping </a>
<a href="{{url('/checkout')}}" class="btn btn-large pull-right">Next <i class="icon-arrow-right"></i></a>

</div>
@endsection
