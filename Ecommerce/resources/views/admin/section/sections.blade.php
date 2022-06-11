@extends("layouts.admin_layouts.admin_layout")
@section('title','Section List')
@section('script_css')
<link href="{{asset('backEnd/plugins/datatable/css/dataTables.bootstrap5.min.css')}}" rel="stylesheet" />
@endsection
@section("content")
		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				<h6 class="mb-0 text-uppercase">Section List</h6>
				<a style="float: right; margin-top: -30px;" href="{{url('admin/add-edit-section')}}"><button type="button" class="btn btn-success btn-sm">Section Create <i class="lni lni-circle-plus"></i></button></a>
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
										<th>Status</th>
										<th width="10%">Modify</th>
									</tr>
								</thead>
								<tbody>
								@foreach($sections as $key => $section)
                                    <tr>
										<td>{{$key+1}}</td>
										<td>{{$section['name']}}</td>
										<td>
											@if($section['status'] ==1)
												<a class="updateSectionStatus" id="section-{{$section->id}}" section_id="{{$section->id}}" href="javascript:void(0)">Active</a>  
											@else
												<a class="updateSectionStatus" id="section-{{$section->id}}" section_id="{{$section->id}}" href="javascript:void(0)">Inactive</a>  
											@endif
										</td>
										<td>
											<a href="{{url('admin/add-edit-section/'.$section['id'])}}"><button type="button" class="btn btn-success btn-sm"><i class="fadeIn animated bx bx-edit"></i></button></a>  

											<a class="confirmDelete btn btn-danger btn-sm" record="section" recoedid="{{$section->id}}" href="javascript:void('0')" style="font-size: 16px;"><i class="fadeIn animated bx bx-trash-alt"></i></a>
										</td>
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