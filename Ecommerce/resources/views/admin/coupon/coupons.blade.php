@extends("layouts.admin_layouts.admin_layout")
@section('title','Coupon List')
@section('script_css')
<link href="{{asset('backEnd/plugins/datatable/css/dataTables.bootstrap5.min.css')}}" rel="stylesheet" />
@endsection
@section("content")
		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				<h6 class="mb-0 text-uppercase">Coupon List</h6>
				<a style="float: right; margin-top: -30px;" href="{{url('admin/add-edit-coupon')}}"><button type="button" class="btn btn-success btn-sm">Coupon Create <i class="lni lni-circle-plus"></i></button></a>
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
										<th>Code</th>
                                        <th>Type</th>
                                        <th>Amount</th>
                                        <th>Expity Date</th>
										@if($couponModul['edit_access'] == 1 || $couponModul['full_access'] ==1)
                                        <th>Status</th>
										<th width="10%">Modify</th>
										@endif 
									</tr>
								</thead>
								<tbody>
								@foreach($coupons as $key => $coupon)
                                    <tr>
										<td>{{$key+1}}</td>
                                        <td>{{$coupon['coupon_code']}}</td>
                                        <td>{{$coupon['coupon_type']}}</td>
                                        <td>{{$coupon['amount']}}
                                            @if($coupon['amount_type']=='Percentage')
                                                %
                                            @else 
                                                $
                                            @endif
                                        </td>
                                        <td>
											{{ $coupon->expiry_date? date('d-M-Y',strtotime($coupon->expiry_date)): '' }}
										</td>
										@if($couponModul['edit_access'] == 1 || $couponModul['full_access'] ==1)
										<td>
											@if($coupon['status'] ==1)
												<a class="updateCouponStatus" id="coupon-{{$coupon->id}}" coupon_id="{{$coupon->id}}" href="javascript:void(0)">Active</a>  
											@else
												<a class="updateCouponStatus" id="coupon-{{$coupon->id}}" coupon_id="{{$coupon->id}}" href="javascript:void(0)">Inactive</a>  
											@endif
										</td>
										<td>
											<a href="{{url('admin/add-edit-coupon/'.$coupon['id'])}}"><i class="btn btn-success btn-sm fadeIn animated bx bx-edit"></i></a>  
											@if($couponModul['full_access'] ==1)
											<a class="confirmDelete" record="coupon" recoedid="{{$coupon->id}}" href="javascript:void('0')" style="font-size: 16px;"><i class="btn btn-danger btn-sm fadeIn animated bx bx-trash-alt"></i></a>
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