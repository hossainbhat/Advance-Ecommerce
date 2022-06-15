@extends("layouts.admin_layouts.admin_layout")
@section('title','Profile')
@section("content")
<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">User Profile</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">User Profile</li>
							</ol>
						</nav>
					</div>
				</div>
				<!--end breadcrumb-->
				<div class="container">
					<div class="main-body">
						<div class="row">
							<div class="col-lg-4">
								<div class="card">
									<div class="card-body">
										<div class="d-flex flex-column align-items-center text-center">
											<?php $image_path = "backEnd/images/profile/".Auth::guard('admin')->user()->image;?>
											@if(!empty(Auth::guard('admin')->user()->image) && file_exists($image_path))
											<img src="{{asset('backEnd/images/profile/'.Auth::guard('admin')->user()->image )}}" alt="Admin" class="rounded-circle p-1 bg-primary" width="110">
											@else 
											<img src="{{asset('backEnd/images/profile/no-image.jpg')}}" alt="Admin" class="rounded-circle p-1 bg-primary" width="110">
											@endif
											<div class="mt-3">
												<h4>{{ Auth::guard('admin')->user()->name }}</h4>
												<p class="text-secondary mb-1">{{ Auth::guard('admin')->user()->type }}</p>
												<p class="text-muted font-size-sm">{{ Auth::guard('admin')->user()->address }}</p>
												<button class="btn btn-outline-primary">Message</button>
											</div>
										</div>
										<hr class="my-4">
									</div>
								</div>
							</div>

							<div class="col-lg-8">
							@if(Session::has('success_message'))
							<div class="alert alert-success border-0 bg-success alert-dismissible fade show">
								<div class="text-white"> {{Session::get('success_message')}}</div>
								<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
							</div>
							@endif
							@if ($errors->any())
							<div class="alert alert-danger" style="margin-top: 10px;">
								<ul>
									@foreach ($errors->all() as $error)
										<li>{{ $error }}</li>
									@endforeach
								</ul>
								</div>
							@endif
								<div class="card">
								<form action="{{url('admin/profile')}}" method="post" enctype="multipart/form-data">
										@csrf
									<div class="card-body">
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Full Name</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="text" name="name" id="name" class="form-control" value="{{ Auth::guard('admin')->user()->name }}">
											</div>
										</div>
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Email</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="text"readonly  name="email" id="email" class="form-control" value="{{ Auth::guard('admin')->user()->email }}">
											</div>
										</div>
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Type</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="text" readonly name="type" id="type" class="form-control" value="{{ Auth::guard('admin')->user()->type }}">
											</div>
										</div>
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Mobile</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="text" name="mobile" id="mobile" class="form-control" value="{{ Auth::guard('admin')->user()->mobile }}">
											</div>
										</div>
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Address</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="text" name="address" id="address" class="form-control" value="{{ Auth::guard('admin')->user()->address }}">
											</div>
										</div>
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Image</h6>
											</div>
											<div class="col-sm-9 text-secondary">
                                                <label for="formFile" class="form-label">Default file input example</label>
                                                <input class="form-control" name="image" required type="file" id="formFile">
											</div>
                                            @if(!empty(Auth::guard('admin')->user()->image))
                                            <div style="height: 90px;">
                                                <img style="width: 80px; margin-top: 5px;" src="{{asset('backEnd/images/profile/'.Auth::guard('admin')->user()->image )}}" >
                                                &nbsp;
                                                <a class="confirmDelete" record="profile-image" recoedid="{{ Auth::guard('admin')->user()->id }}" href="javascript:void('0')">Delete</a>
                                            </div>
                                        @endif
										</div>
										<div class="row">
											<div class="col-sm-3"></div>
											<div class="col-sm-9 text-secondary">
												<input type="submit" class="btn btn-primary px-4" value="Save Changes">
											</div>
										</div>
									</div>
								</form>
								</div>
                                <div class="card">
								<form action="{{ url('/admin/update-pwd') }}" method="post">
									@csrf
									<div class="card-body">
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Current Password</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="password" name="current_pwd" id="current_pwd" class="form-control" placeholder="current password">
												<span id="chkPwd"></span>
											</div>
										</div>
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">New Password</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="password" name="new_pwd" id="new_pwd" class="form-control" placeholder="new password">
											</div>
										</div>
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Confirm New Password</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="password" name="confirm_pwd" id="confirm_pwd" class="form-control" placeholder="confirm new password">
											</div>
										</div>
										<div class="row">
											<div class="col-sm-3"></div>
											<div class="col-sm-9 text-secondary">
												<input type="submit" class="btn btn-primary px-4" value="Update">
											</div>
										</div>
									</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
@endsection