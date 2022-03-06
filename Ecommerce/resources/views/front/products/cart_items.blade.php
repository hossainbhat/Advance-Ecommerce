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
                <td>৳.{{ $attrPrice['discount'] }}</td>
                <td>৳.{{ $attrPrice['product_price'] * $item['quantity'] - $attrPrice['discount']}}</td>
              </tr>
              <?php $total_price = $total_price + ( $attrPrice['final_price'] * $item['quantity']); ?>
              @endforeach
              <tr>
                <td colspan="5" style="text-align:right">Total Price:	</td>
                <td> ৳.{{$total_price}}</td>
            </tr>
            <tr>
              <td colspan="5" style="text-align:right">Discount:	</td>
              <td> ৳.3000.00</td>
          </tr>
          <tr>
              <td colspan="5" style="text-align:right"><strong>GRAND TOTAL (৳.{{$total_price}} - ৳.0 ) =</strong></td>
              <td class="label label-important" style="display:block"> <strong> ৳.{{$total_price}} </strong></td>
          </tr>
        </table>


        <table class="table table-bordered">
  <tbody>
      <tr>
        <td>
        <form class="form-horizontal">
        <div class="control-group">
        <label class="control-label"><strong> VOUCHERS CODE: </strong> </label>
        <div class="controls">
        <input type="text" class="input-medium" placeholder="CODE">
        <button type="submit" class="btn"> ADD </button>
        </div>
        </div>
        </form>
      </td>
    </tr>


  </tbody>
  </table>