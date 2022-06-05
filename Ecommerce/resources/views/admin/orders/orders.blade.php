@extends("layouts.admin_layouts.admin_layout")
@section('title','Section List')
@section('script_css')
<link href="{{asset('backEnd/plugins/datatable/css/dataTables.bootstrap5.min.css')}}" rel="stylesheet" />
@endsection
@section("content")
		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				<h6 class="mb-0 text-uppercase">Order List</h6>
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
										<th>Payment Method</th>
										<th width="10%">Action</th>
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
                                            {{$pro['product_code']}} ({{$pro['product_qty']}}) <br>
                                        @endforeach
                                        </td>
										<td>{{$order['grand_total']}}</td>
										<td>{{$order['order_status']}}</td>
										<td>{{$order['payment_method']}}</td>
										<td>
											<a href="{{url('admin/order/'.$order['id'])}}"><i class="btn btn-info btn-sm fadeIn animated bx bx-file-blank"></i></a>  

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