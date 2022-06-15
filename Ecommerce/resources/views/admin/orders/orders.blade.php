@extends("layouts.admin_layouts.admin_layout")
@section('title','Oders List')
@section('script_css')
<link href="{{asset('backEnd/plugins/datatable/css/dataTables.bootstrap5.min.css')}}" rel="stylesheet" />
@endsection
@section("content")
		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				<h6 class="mb-0 text-uppercase">Order List</h6>
				<a href="{{url('admin/view-orders-chart')}}" style="float:right; margin-top:-30px;"><button class="btn btn-sm btn-success">Orders Chart</button></a>

				<hr/>
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
						  @if(Session::has('success_message'))
							<div class="alert alert-success border-0 bg-success alert-dismissible fade show">
								<div class="text-white">{{Session::get('success_message')}}</div>
								<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
							</div>
						  @endif
							<table id="example" class="table table-striped table-bordered" style="width:100%">
								<thead>
									<tr>
										<th>Order Id</th>
										<th>Order Date</th>
										<th>Name</th>
										<th>Email</th>
										<th>Product</th>
										<th>Amount</th>
										<th>Status</th>
										<th>Payment</th>
										@if($orderModul['full_access'] ==1)
										<th width="10%">Action</th>
										@endif 
									</tr>
								</thead>
								<tbody>
								@foreach($orders as $order)
                                    <tr>
										<td>{{$order['id']}}</td>
                                        <td>{{date('d-M-Y', strtotime($order['created_at']))}}</td>
										<td>{{$order['name']}}</td>
										<td>{{$order['email']}}</td>
										<td>
                                        @foreach($order['orders_products'] as $pro)
                                            <a href="{{url($pro['product_id'])}}">{{$pro['product_code']}}</a> ({{$pro['product_qty']}}) <br>
                                        @endforeach
                                        </td>
										<td>{{$order['grand_total']}}</td>
										<td>{{$order['order_status']}}</td>
										<td>{{$order['payment_method']}}</td>
										@if($orderModul['full_access'] ==1)
										<td>
											<a href="{{url('admin/order/'.$order['id'])}}"><i class="btn btn-info btn-sm fadeIn animated bx bx-file-blank"></i></a>  
											@if($order['order_status']=="Shipped" || $order['order_status']=="Delivered")
											<a href="{{url('admin/view-order-invoice/'.$order['id'])}}" target="__blanck"><i class="btn btn-success btn-sm fadeIn animated bx bx-printer"></i></a>  
											<a href="{{url('admin/print-pdf-invoice/'.$order['id'])}}" target="__blanck"><i class="btn btn-primary btn-sm fadeIn animated bx bx-save"></i></a>  
											@endif 
										</td>
										@endif 
									</tr> 
                                @endforeach
									
								</tbody>
							</table>
						</div>
					</div>
				</div>
				
			</div>
		</div>
		<!--end page wrapper -->
		
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