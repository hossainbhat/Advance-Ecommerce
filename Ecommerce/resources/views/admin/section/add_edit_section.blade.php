@extends("layouts.admin_layouts.admin_layout")
@section('title',$name)
@section('content')
<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				
				<!--end breadcrumb-->
				<div class="row">
					<div class="col-xl-9 mx-auto">
						<h6 class="mb-0 text-uppercase">{{$name}}</h6>                        
						<a href="{{url('admin/sections')}}" style="float:right; margin-top:-30px;"><button class="btn btn-sm btn-success">Section List <i class="lni lni-list"></i></button></a>

						<hr>
						<div class="card">
							<div class="card-body">
								<div class="p-4 border rounded">
										@if(Session::has('error_message'))
											<div class="alert alert-danger border-0 bg-success alert-dismissible fade show">
												<div class="text-white">{{Session::get('error_message')}}</div>
												<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
											</div>
										@endif
										@if ($errors->any())
											<div class="alert alert-danger">
												<ul>
													@foreach ($errors->all() as $error)
														<li>{{ $error }}</li>
													@endforeach
												</ul>
											</div>
										@endif
									<form class="row g-3 needs-validation" @if(empty($sectiondata['id'])) action="{{url('admin/add-edit-section')}}" @else   action="{{url('admin/add-edit-section/'.$sectiondata['id'] )}}" @endif method="post">
                                    @csrf
                                    
										<div class="col-md-9">
											<label for="name" class="form-label">Section Name</label>
											<input type="text" name="name" class="form-control" id="name" placeholder="Enter section name" @if(!empty($sectiondata['name'])) value="{{$sectiondata['name']}}" @else value="{{ old('name')}}" @endif>
										</div>
                                       
										
										<div class="col-12">
											<button class="btn btn-primary" type="submit">{{$name}}</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--end row-->
			</div>
		</div>	
@endsection
