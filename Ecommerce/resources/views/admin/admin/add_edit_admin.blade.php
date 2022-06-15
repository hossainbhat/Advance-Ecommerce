@extends("layouts.admin_layouts.admin_layout")
@section('email',$name)
@section('content')
<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				
				<!--end breadcrumb-->
				<div class="row">
					<div class="col-xl-9 mx-auto">
						<h6 class="mb-0 text-uppercase">{{$name}}</h6>                        
						<a href="{{url('admin/admins')}}" style="float:right; margin-top:-30px;"><button class="btn btn-sm btn-success">Admin / Superadmin List <i class="lni lni-list"></i></button></a>

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
									<form class="row g-3 needs-validation" @if(empty($admindata['id'])) action="{{url('admin/add-edit-admin')}}" @else   action="{{url('admin/add-edit-admin/'.$admindata['id'] )}}" @endif method="post" enctype="multipart/form-data">
                                    @csrf
                                    
										<div class="col-md-6">
											<label for="name" class="form-label">Name</label>
											<input type="text" name="name" class="form-control" id="name" placeholder="Enter name" @if(!empty($admindata['name'])) value="{{$admindata['name']}}" @else value="{{ old('name')}}" @endif>
										</div>
                                        <div class="col-md-6">
											<label for="email" class="form-label">Email</label>
											<input type="text" name="email" class="form-control" id="email" placeholder="Enter email" @if(!empty($admindata['id'])) readonly @endif  @if(!empty($admindata['email']))   value="{{$admindata['email']}}" @else value="{{ old('email')}}" @endif>
										</div>
                                        <div class="col-md-6">
											<label for="type" class="form-label">Type</label>
											<select name="type" @if(!empty($admindata['id'])) disabled="true" @endif  class="form-select mb-3" aria-label="Default select example">
												<option selected="">select</option>
												<option value="admin" @if(!empty($admindata['type']) && $admindata['type']=="admin")  selected @endif >Admin</option>
												<option value="subadmin" @if(!empty($admindata['type']) && $admindata['type']=="subadmin")  selected @endif>SubAdmin</option>
											</select>	
										</div>
                                        <div class="col-md-6">
											<label for="mobile" class="form-label">Mobile</label>
											<input type="text" name="mobile" class="form-control" id="mobile" placeholder="Enter mobile" @if(!empty($admindata['mobile'])) value="{{$admindata['mobile']}}" @else value="{{ old('mobile')}}" @endif>
										</div>
									
									
											<div class="col-md-6 text-secondary">
                                                <label for="formFile" class="form-label">Image</label>
                                                <input class="form-control" name="image" type="file" id="formFile">
											</div>
                                           
									
                                        <div class="col-md-6">
											<label for="password" class="form-label">Password</label>
											<input type="password" name="password" class="form-control" id="password" placeholder="Enter password" >
										</div>
										@if(!empty($admindata['image']))
                                            <div>
                                                <img style="width: 80px;height: 100px; margin-top: 5px;" src="{{asset('backEnd/images/profile/'.$admindata['image'])}}" >
                                                &nbsp;
	                    		                <a class="confirmDelete" record="admin-image" recoedid="{{$admindata['id']}}" href="javascript:void('0')">Delete</a>
                                            </div>
											&nbsp;
                                       		 @endif
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
