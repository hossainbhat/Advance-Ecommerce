@extends("layouts.admin_layouts.admin_layout")
@section('title','User List')
@section('script_css')
<link href="{{asset('backEnd/plugins/datatable/css/dataTables.bootstrap5.min.css')}}" rel="stylesheet" />
@endsection
@section("content")
		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				<h6 class="mb-0 text-uppercase">User List</h6>
				<a style="float: right; margin-top: -30px;" href="{{url('admin/view-users-chart')}}"><button type="button" class="btn btn-success btn-sm">View User Chart</button></a>

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
										<th>Name</th>
										<th>Email</th>
										<th>Mobile</th>
										<th>City</th>
										<th>Country</th>
										@if($userModul['full_access'] ==1)
										<th>Status</th>
										@endif 
									</tr>
								</thead>
								<tbody>
								@foreach($users as $key => $user)
                                    <tr>
										<td>{{$key+1}}</td>
										<td>{{$user['name']}}</td>
                                        <td>{{$user['email']}}</td>
                                        <td>{{$user['mobile']}}</td>
                                        <td>{{$user['city']}}</td>
                                        <td>{{$user['country']}}</td>
										@if($userModul['full_access'] ==1)
										<td>
											@if($user['status'] ==1)
												<a class="updateUserStatus" id="user-{{$user['id']}}" user_id="{{$user['id']}}" href="javascript:void(0)">Active</a>  
											@else
												<a class="updateUserStatus" id="user-{{$user['id']}}" user_id="{{$user['id']}}" href="javascript:void(0)">Inactive</a>  
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