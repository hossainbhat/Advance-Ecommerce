@extends("layouts.admin_layouts.admin_layout")
@section('content')
<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				
				<!--end breadcrumb-->
				<div class="row">
					<div class="col-xl-9 mx-auto">
						<h6 class="mb-0 text-uppercase">Site Setting</h6>                        

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
									<form class="row g-3 needs-validation" action="#" method="post" enctype="multipart/form-data">
                                    @csrf
                                    
										<div class="col-md-9">
											<label for="link" class="form-label">link</label>
											<input type="text" name="link" class="form-control" id="link" placeholder="Enter link" >
										</div>
                                       
										<div class="col-12">
											<button class="btn btn-primary" type="submit">Update</button>
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
