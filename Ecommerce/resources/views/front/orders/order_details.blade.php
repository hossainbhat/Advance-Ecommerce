<?php use App\Models\Product; ?>
@extends("layouts.front_layouts.front_layout")
@section('title','Order Details')
@section('content')
<div class="span9">
    <ul class="breadcrumb">
		<li><a href="{{url('/')}}">Home</a> <span class="divider">/</span></li>
		<li class="active">Orders</li>
    </ul>
	<h3> Order #{{$orderDetails['id']}} Details</h3>	
	<hr class="soft"/>
         <div class="row">
            <div class="span4">
                <table class="table table-striped table-bordered">
                    <tr>
                        <td colspan="2"><strong>Order Details</strong></td>
                    </tr>
                    <tr>
                        <td>Order Date</td>
                        <td>{{date('d-M-Y', strtotime($orderDetails['created_at']))}}</td>
                    </tr>
                    <tr>
                        <td>Order Status</td>
                        <td>{{$orderDetails['order_status']}}</td>
                    </tr>
                    @if(!empty($orderDetails['courier_name']))
                    <tr>
                        <td>Courier Name</td>
                        <td>{{$orderDetails['courier_name']}}</td>
                    </tr>
                    @endif 
                    @if(!empty($orderDetails['traking_number']))
                    <tr>
                        <td>Traking Number</td>
                        <td>{{$orderDetails['traking_number']}}</td>
                    </tr>
                    @endif 
                    <tr>
                        <td>Order Total</td>
                        <td>{{$orderDetails['grand_total']}}</td>
                    </tr>
                    <tr>
                        <td>Shipping Charge</td>
                        <td>{{$orderDetails['shipping_charge']}}</td>
                    </tr>
                    <tr>
                        <td>Cupon Code</td>
                        <td>{{$orderDetails['coupon_code']}}</td>
                    </tr>
                    <tr>
                        <td>Coupon Amount</td>
                        <td>{{$orderDetails['coupon_amount']}}</td>
                    </tr>
                    <tr>
                        <td>Payment Method</td>
                        <td>{{$orderDetails['payment_method']}}</td>
                    </tr>
                </table>
            </div>
            <div class="span4">
                <table class="table table-striped table-bordered">
                    <tr>
                        <td colspan="2"><strong>Delivary Address</strong></td>
                    </tr>
                    <tr>
                        <td>Name</td>
                        <td>{{$orderDetails['name']}}</td>
                    </tr>
                    <tr>
                        <td>Address</td>
                        <td>{{$orderDetails['address']}}</td>
                    </tr>
                    <tr>
                        <td>City</td>
                        <td>{{$orderDetails['city']}}</td>
                    </tr>
                    <tr>
                        <td>State</td>
                        <td>{{$orderDetails['state']}}</td>
                    </tr>
                    <tr>
                        <td>Country</td>
                        <td>{{$orderDetails['country']}}</td>
                    </tr>
                    <tr>
                        <td>Pincode</td>
                        <td>{{$orderDetails['pincode']}}</td>
                    </tr>
                    <tr>
                        <td>Mobile</td>
                        <td>{{$orderDetails['mobile']}}</td>
                    </tr>

                </table>
            </div>
	    </div>
        
        <div class="row">
            <div class="span8">
                <table class="table table-striped table-bordered">
                    <tr>
                        <td>Product Image</td>
                        <td>Product Code</td>
                        <td>Product Name</td>
                        <td>Product size</td>
                        <td>Product Color</td>
                        <td>Product Qty</td>
                    </tr>
                    @foreach($orderDetails['orders_products'] as $product)
                    <tr>
                        <td>
                            <?php $getProductImage = Product::getProductImage($product['product_id']) ?>
                            <a href="{{url($product['product_id'])}}"><img style="width:80px;height:90px;" src="{{asset('backEnd/images/products/small/'.$getProductImage)}}" alt=""></a>
                        </td>
                        <td>{{$product['product_code']}}</td>
                        <td>{{$product['product_name']}}</td>
                        <td>{{$product['product_size']}}</td>
                        <td>{{$product['product_color']}}</td>
                        <td>{{$product['product_qty']}}</td>
                        
                    </tr>
                    @endforeach
                </table>
            </div>
		
	    </div>
	</div>	
	
</div>
@endsection