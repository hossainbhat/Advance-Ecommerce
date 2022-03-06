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
						<a href="{{url('admin/brands')}}" style="float:right; margin-top:-30px;"><button class="btn btn-sm btn-success">Brand List <i class="lni lni-list"></i></button></a>

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
									<form class="row g-3 needs-validation" @if(empty($bannerdata['id'])) action="{{url('admin/add-edit-banner')}}" @else   action="{{url('admin/add-edit-banner/'.$bannerdata['id'] )}}" @endif method="post" enctype="multipart/form-data">
                                    @csrf
                                    
										<div class="col-md-9">
											<label for="link" class="form-label">link</label>
											<input type="text" name="link" class="form-control" id="link" placeholder="Enter link" @if(!empty($bannerdata['link'])) value="{{$bannerdata['link']}}" @else value="{{ old('link')}}" @endif>
										</div>
                                        <div class="col-md-9">
											<label for="title" class="form-label">title</label>
											<input type="text" name="title" class="form-control" id="title" placeholder="Enter title" @if(!empty($bannerdata['title'])) value="{{$bannerdata['title']}}" @else value="{{ old('title')}}" @endif>
										</div>
                                        <div class="col-md-9">
											<label for="alt" class="form-label">alt</label>
											<input type="text" name="alt" class="form-control" id="alt" placeholder="Enter alt" @if(!empty($bannerdata['alt'])) value="{{$bannerdata['alt']}}" @else value="{{ old('alt')}}" @endif>
										</div>
										<div class="row mb-3">
											<div class="col-sm-9 text-secondary">
                                                <label for="formFile" class="form-label">Banner Image</label>
                                                <input class="form-control" name="image" type="file" id="formFile">
											</div>
                                            @if(!empty($bannerdata['image']))
                                            <div style="height: 90px;">
                                                <img style="width: 80px; margin-top: 5px;" src="{{asset('backEnd/images/banners/'.$bannerdata['image'])}}" >
                                                &nbsp;
	                    		                <a class="confirmDelete" record="banner-image" recoedid="{{$bannerdata['id']}}" href="javascript:void('0')">Delete</a>
                                            </div>
                                       		 @endif
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
