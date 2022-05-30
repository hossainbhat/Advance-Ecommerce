<?php 
use App\Models\Product; 
?>
@extends("layouts.front_layouts.front_layout")
@section("content")
<div class="span9">
  <ul class="breadcrumb">
  <li><a href="index.html">Home</a> <span class="divider">/</span></li>
  <li class="active"> Checkout</li>
  </ul>
<h3>  Checkout [ <small> <span class="totalCartItems">{{ totalCartItems() }} </span> Item(s) </small>]<a href="{{url('/cart')}}" class="btn btn-large pull-right"><i class="icon-arrow-left"></i> Back to Cart </a></h3>
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

<form name="checkoutForm" id="checkoutForm" action="{{url('checkout')}}" method="post">
  @csrf 
  <table class="table table-bordered">
      <tbody><tr><th><strong>DELIVERY ADDRESSES</strong>  <a style="float:right;" href="{{url('add-edit-dalivary-address')}}">Add</a>  </th></tr>
      @foreach($deliveryAddress as $address) 
          <tr> 
              <td>
                  <div class="control-group" style="float:left; margin-right:5px; margin-top:-2px;">
                      <input type="radio" id="address{{$address->id}}" name="address_id" value="{{$address->id}}">
                  </div>
                  <div class="control-group">
                      <label class="control-label">{{$address->name}},{{$address->address}},{{$address->city}},{{$address->state}},{{$address->country}},({{$address->mobile}})</label>
                  </div>
                      
              </td>
              <td><a href="{{url('add-edit-dalivary-address/'.$address->id)}}">Edit</a> / <a class="delivaryAddressDelete" href="{{url('delete-dalivary-address/'.$address->id)}}">Delete</a></td>
        </tr>
            @endforeach
    </tbody>
  </table>

  <table class="table table-bordered">
            <thead>
              <tr>
                <th>Product</th>
                <th>Description</th>
                <th>Quantity</th>
                <th>Unit Price</th>
                <th>Category<br>Product<br>Discount</th>
                <th>Sub Total</th>
              </tr>
            </thead>
            <tbody>
                <?php $total_price =0; ?>
                @foreach($userCartItems as $item)
                <?php $attrPrice = Product::getDiscountedAttrPrice($item['product_id'],$item['size']); ?>
                <tr>
                  <td> <img width="60" src="{{asset('backEnd/images/products/small/'.$item['product']['main_image'])}}" alt=""/></td>
                  <td>{{$item['product']['product_name']}}<br/>Color : {{$item['product']['product_color']}} | Code : {{$item['product']['product_code']}}<br/>Size : {{$item['size']}}</td>
                  <td> {{$item['quantity']}} </div>
                  </td>
                  <td>৳.{{ $attrPrice['product_price'] }}</td>
                  <?php
                    $totaldiscount = round($attrPrice['discount']*$item['quantity']);
                    
                    
                    $subtotal = $attrPrice['product_price'] * $item['quantity'] - $totaldiscount;
                    // $subtotalall = $subtotal - $totaldiscount;
                  ?>
                  <td>৳.{{ ($totaldiscount) }}</td>
                  <td>৳.{{ ($subtotal)}}</td>
                </tr>
                <?php $total_price = $total_price + ( $attrPrice['final_price'] * $item['quantity']); 
                ?>
                @endforeach
                <tr>
                  <td colspan="5" style="text-align:right">Total Price:	</td>
                  <td> ৳.{{$total_price}}</td>
              </tr>
              <tr>
                <td colspan="5" style="text-align:right">Coupon Discount:	</td>
                <td class="couponAmount"> 
                  @if(Session::has('couponAmount'))
                    ৳. {{Session::get('couponAmount')}}
                  @else 
                    ৳. 0
                  @endif 
                </td>
            </tr>
            <tr>
                <td colspan="5" style="text-align:right"><strong>GRAND TOTAL (৳.{{$total_price}} - <span class="couponAmount">৳. @if(Session::get('couponAmount')){{{Session::get('couponAmount')}}} @else 0 @endif</span> ) =</strong></td>
                <td class="label label-important" style="display:block"> <strong class="grand_total"> ৳.{{ $grand_total = $total_price - Session::get('couponAmount')}} <?php Session::put('grand_total',$grand_total); ?></strong></td>
                
            </tr>
  </table>

  <table class="table table-bordered">
    <tbody>
        <tr>
          <td>
            <div class="control-group">
              <label class="control-label"><strong> PAYMENT METHODS :</strong> </label>
              <div class="controls">
                <span>
                  <input  style="margin-right:5px; margin-top:-2px;" type="radio" name="payment_getwaya" id="COD" value="COD"><strong>COD</strong> &nbsp;&nbsp;
                  <input  style="margin-right:5px; margin-top:-2px;" type="radio" name="payment_getwaya" id="Paypal" value="Paypal"><strong>Paypal</strong>
                </span>
              </div>
            </div>
          </td>
        </tr>
      </tbody>
  </table>

  <a href="{{url('/cart')}}" class="btn btn-large"><i class="icon-arrow-left"></i> Back to Cart </a>
  <button  type="submit" class="btn btn-large pull-right">Place Order <i class="icon-arrow-right"></i></button>
</form>
</div>
@endsection
