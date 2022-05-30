<?php 
use App\Models\Product; 
?>
<table class="table table-bordered">
          <thead>
            <tr>
              <th>Product</th>
              <th>Description</th>
              <th>Quantity/Update</th>
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
                <td>
                  <div class="input-append">
                    <input class="span1" style="max-width:34px" value="{{$item['quantity']}}" placeholder="1" id="appendedInputButtons" size="16" type="text"><button class="btn btnItemUpdate qtyMinus" data-cartId="{{$item['id']}}" type="button"><i class="fas fa-minus"></i></button><button class="btn btnItemUpdate qtyPlus" data-cartid="{{$item['id']}}" type="button"><i class="fas fa-plus"></i></button><button class="btn btn-danger btnItemDelete" data-cartId="{{$item['id']}}" type="button"><i class="fas fa-times"></i></button>
                  </div>
                </td>
                <td>৳.{{ $attrPrice['product_price'] }}</td>
                <?php
                  $totaldiscount = round($attrPrice['discount']*$item['quantity']);
                  
                  
                  $subtotal = round($attrPrice['product_price'] * $item['quantity'] - $totaldiscount);
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
              <td colspan="5" style="text-align:right"><strong>GRAND TOTAL (৳.{{$total_price}} - <span class="couponAmount">৳.0</span> ) =</strong></td>
              <td class="label label-important" style="display:block"> <strong class="grand_total"> ৳.{{$total_price - Session::get('couponAmount')}} </strong></td>
          </tr>
        </table>


        <table class="table table-bordered">
  <tbody>
      <tr>
        <td>
        <form id="ApplyCoupon" method="post" action="javascript:void(0);" class="form-horizontal" @if(Auth::check()) user=1 @endif >
          @csrf 
          <div class="control-group">
            <label class="control-label"><strong> COUPON CODE: </strong> </label>
            <div class="controls">
              <input type="text" name="code" id="code" class="input-medium" placeholder="Enter Coupon Code" required="">
              <button type="submit" class="btn"> Apply </button>
            </div>
          </div>
        </form>
      </td>
    </tr>


  </tbody>
  </table>