@extends("layouts.admin_layouts.admin_layout")
@section('title','Shepping Charge List')
@section('script_css')
<link href="{{asset('backEnd/plugins/datatable/css/dataTables.bootstrap5.min.css')}}" rel="stylesheet" />
@endsection
@section("content")
		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				<h6 class="mb-0 text-uppercase">Shipping Charge List</h6>
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
										<th width="10%">SL#</th>
										<th>Country</th>
                                        <th>0 To 500g</th>
                                        <th>501g To 1000g</th>
                                        <th>1001g To 2000g</th>
                                        <th>2001g To 3000g</th>
                                        <th>3001g To 4000g</th>
                                        <th>above To 5000g</th>
										<th>Status</th>
										<th>Updated At</th>
										<th width="10%">Modify</th>
									</tr>
								</thead>
								<tbody>
								@foreach($shipping_charges as $key => $shipping)
                                    <tr>
										<td>{{$key+1}}</td>
										<td>{{$shipping['country']}}</td>
                                        <td>{{$shipping['0_500g']}}</td>
                                        <td>{{$shipping['501g_1000g']}}</td>
                                        <td>{{$shipping['1001g_2000g']}}</td>
                                        <td>{{$shipping['2001g_3000g']}}</td>
                                        <td>{{$shipping['3001g_4000g']}}</td>
                                        <td>{{$shipping['above_5000g']}}</td>
										<td>
											@if($shipping['status'] ==1)
												<a class="updateShippingChargeStatus" id="shipping-{{$shipping['id']}}" shipping_id="{{$shipping['id']}}" href="javascript:void(0)">Active</a>  
											@else
												<a class="updateShippingChargeStatus" id="shipping-{{$shipping['id']}}" shipping_id="{{$shipping['id']}}" href="javascript:void(0)">Inactive</a>  
											@endif
										</td>
                                        <td>{{date('d-M-Y', strtotime($shipping['updated_at']))}}</td>
										<td>
											<a href="{{url('admin/edit-shipping-charges/'.$shipping['id'])}}"><button type="button" class="btn btn-success btn-sm"><i class="fadeIn animated bx bx-edit"></i></button></a>  
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