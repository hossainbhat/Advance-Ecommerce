@extends("layouts.admin_layouts.admin_layout")
@section('title','Rating List')
@section('script_css')
<link href="{{asset('backEnd/plugins/datatable/css/dataTables.bootstrap5.min.css')}}" rel="stylesheet" />
@endsection
@section("content")
		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				<h6 class="mb-0 text-uppercase">Rating List</h6>
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
										<th>User Email</th>
										<th>Product Name</th>
										<th>Review</th>
										<th>Rating</th>
										@if($ratingModul['full_access'] ==1)
										<th width="10%">Status</th>
										@endif 
									</tr>
								</thead>
								<tbody>
								@foreach($ratings as $key => $rating)
                                    <tr>
										<td>{{$key+1}}</td>
										<td>{{$rating['user']['email']}}</td>
										<td><a href="{{url($rating['id'])}}">{{$rating['product']['product_name']}}</a></td>
										<td>{{$rating['review']}}</td>
										<td>{{$rating['rating']}}</td>
										@if($ratingModul['full_access'] ==1)
										<td>
											@if($rating['status'] ==1)
												<a class="updateRatingStatus" id="rating-{{$rating['id']}}" rating_id="{{$rating['id']}}" href="javascript:void(0)">Active</a>  
											@else
												<a class="updateRatingStatus" id="rating-{{$rating['id']}}" rating_id="{{$rating['id']}}" href="javascript:void(0)">Inactive</a>  
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