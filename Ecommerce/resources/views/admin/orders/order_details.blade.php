
<?php use App\Models\Product; ?>
@extends("layouts.admin_layouts.admin_layout")
@section('title','Orders Details')
@section('script_css')
<link href="{{asset('backEnd/plugins/datatable/css/dataTables.bootstrap5.min.css')}}" rel="stylesheet" />
@endsection
@section("content")
<div class="page-wrapper">
			<div class="page-content">
			<h6 class="mb-0 text-uppercase">Order #{{$orderDetails['id']}} Details</h6>
						<hr>
				<!--end breadcrumb-->
                @if(Session::has('success_message'))
							<div class="alert alert-success border-0 bg-success alert-dismissible fade show">
								<div class="text-white">{{Session::get('success_message')}}</div>
								<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
							</div>
						  @endif
				<div class="row">
					<div class="col-xl-6 mx-auto">
					
						<div class="card">
							<div class="card-body">
								<table class="table table-bordered mb-0">
									
									<tbody>
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

									</tbody>
								</table>
							</div>
						</div>


                        
					</div>
                    <div class="col-xl-6 mx-auto">
					
						<div class="card">
							<div class="card-body">
								<table class="table table-bordered mb-0">
									
									<tbody>

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

									</tbody>
								</table>
							</div>
						</div>


                        
					</div>
                    
                    <div class="col-xl-6 mx-auto">
					
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-bordered mb-0">
                               
                                <tbody>

                                        <tr>
                                            <td colspan="2"><strong>Billing Address</strong></td>
                                        </tr>
                                        <tr>
                                            <td>Name</td>
                                            <td>{{$userDetails['name']}}</td>
                                        </tr>
                                        <tr>
                                            <td>Address</td>
                                            <td>{{$userDetails['address']}}</td>
                                        </tr>
                                        <tr>
                                            <td>City</td>
                                            <td>{{$userDetails['city']}}</td>
                                        </tr>
                                        <tr>
                                            <td>Mobile</td>
                                            <td>{{$userDetails['mobile']}}</td>
                                        </tr>
                                        <tr>
                                            <td>Pincode</td>
                                            <td>{{$userDetails['pincode']}}</td>
                                        </tr>
                                        <tr>
                                            <td>State</td>
                                            <td>{{$userDetails['state']}}</td>
                                        </tr>
                                        <tr>
                                            <td>Country</td>
                                            <td>{{$userDetails['country']}}</td>
                                        </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>


                    
                </div>
                <div class="col-xl-6 mx-auto">
						<div class="card">
							<div class="card-body">
								<table class="table table-bordered mb-0">
                               
                                            <tr>
                                                <td colspan="2"><strong>Update Order Status</strong></td>
                                            </tr>
                                        <form action="{{url('admin/update-order-status')}}" method="post">
                                            @csrf
                                                <input type="hidden" name="order_id" value="{{$orderDetails['id']}}">
                                                <tr>
                                                    <td>
                                                    
                                                        <select name="order_status" id="order_status" required="" class="form-select form-select-sm mb-3" aria-label=".form-select-sm example">
                                                            <option selected="">Select Status</option>
                                                            @foreach($orderStatus as $status)
                                                                <option value="{{$status['name']}}" @if($orderDetails['order_status'] && $orderDetails['order_status'] == $status['name']) selected="" @endif>{{$status['name']}}</option>
                                                            @endforeach
                                                        </select>
                                                    </td>
                                                    
                                                    <td @if(empty($orderDetails['courier_name'])) id="courier_name" @endif><input style="width:120px;" type="text" name="courier_name" placeholder="Courier Name" value="{{$orderDetails['courier_name']}}"></td>
                                                    <td @if(empty($orderDetails['traking_number'])) id="traking_number" @endif> <input style="width:120px;" type="text" name="traking_number" placeholder="Traking Number" value="{{$orderDetails['traking_number']}}"></td>

                                                    <td><input type="submit" value="Update" class="btn btn-success btn-sm"></td>
                                                </tr>
                                                <tr>
                                                    <td  colspan="4">
                                                        @foreach($orderLog as $log)
                                                            <strong>{{$log['order_status']}}</strong> <br>{{date('d-M-Y g:i:sa', strtotime($log['created_at']))}} <hr>
                                                        @endforeach
                                                    </td>
                                                </tr>
                                        </form>
								</table>
							</div>
						</div>


                        
					</div>
                    <div class="col-xl-12 mx-auto">
					
						<div class="card">
							<div class="card-body">
								<table class="table table-bordered mb-0">
									<thead>
										<tr>
                                            <td>Product Image</td>
                                            <td>Product Code</td>
                                            <td>Product Name</td>
                                            <td>Product size</td>
                                            <td>Product Color</td>
                                            <td>Product Qty</td>
										</tr>
									</thead>
									<tbody>

                                        @foreach($orderDetails['orders_products'] as $product)
                                            <tr>
                                                <td>
                                                    <?php $getProductImage = Product::getProductImage($product['product_id']) ?>
                                                    <a href="{{url($product['product_id'])}}"><img style="width:80px;height:90px;" src="{{asset('backEnd/images/products/small/'.$getProductImage)}}" alt=""></a>
                                                </td>
                                                <td>{{$product['product_code']}}</td>
                                                <td><a href="{{url($product['product_id'])}}">{{$product['product_name']}}</a></td>
                                                <td>{{$product['product_size']}}</td>
                                                <td>{{$product['product_color']}}</td>
                                                <td>{{$product['product_qty']}}</td>
                                                
                                            </tr>
                                        @endforeach

									</tbody>
								</table>
							</div>
						</div>


                        
					</div>
                   
                    
				</div>
				<!--end row-->
			</div>
		</div>
@endsection
@section("script_js")
<script src="{{asset('backEnd/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
	<script src="{{asset('backEnd/plugins/datatable/js/dataTables.bootstrap5.min.js')}}"></script>
	<script>
		$(document).ready(function() {
			$('#example').DataTable();
		  } );
	</script>

@endsection