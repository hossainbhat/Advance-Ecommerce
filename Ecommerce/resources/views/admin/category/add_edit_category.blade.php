@extends("layouts.admin_layouts.admin_layout")
@section('title',$name)
@section('script_css')
<link href="{{asset('backEnd/plugins/select2/css/select2.min.css')}}" rel="stylesheet" />
<link href="{{asset('backEnd/plugins/select2/css/select2-bootstrap4.css')}}" rel="stylesheet" />
@endsection
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
									<form class="row g-3 needs-validation" @if(empty($categorydata['id'])) action="{{url('admin/add-edit-category')}}" @else   action="{{url('admin/add-edit-category/'.$categorydata['id'] )}}" @endif method="post" enctype="multipart/form-data">
                                    @csrf
                                        <div class="col-md-9">
                                            <div class="mb-3" data-select2-id="21">
										        <label class="form-label">Section Name</label>
                                                <select name="section_id" id="section_id" class="section-select select2-hidden-accessible" data-select2-id="3" tabindex="-3" aria-hidden="true">
                                                <option value="0">Select</option>
                                                @foreach($sections as $section)
                                                    <option value="{{$section->id}}" @if(!empty($categorydata['section_id']) && $categorydata['section_id'] == $section->id ) selected @endif > {{$section->name}} </option>
                                                @endforeach
                                                </select>
								            </div>
                                        </div>
										<div class="col-md-9">
											<label for="name" class="form-label">Category name</label>
											<input type="text" name="name" class="form-control" id="name" placeholder="Enter category name" @if(!empty($categorydata['name'])) value="{{$categorydata['name']}}" @else value="{{ old('name')}}" @endif>
										</div>
                                        <div id="appendCategoriesLevel" class="col-md-9">
                                            @include("admin.category.append_categories")
                                        </div>
                                        <div class="col-md-9">
											<label for="discount" class="form-label">Category Discount</label>
											<input type="text" name="discount" class="form-control" id="discount" placeholder="Enter category discount" @if(!empty($categorydata['discount'])) value="{{$categorydata['discount']}}" @else value="{{ old('discount')}}" @endif>
										</div>
                                        
                                        <div class="col-md-9">
											<label for="url" class="form-label">Category Url</label>
											<input type="text" name="url" class="form-control" id="url" placeholder="Enter url" @if(!empty($categorydata['url'])) value="{{$categorydata['url']}}" @else value="{{ old('url')}}" @endif>
										</div>
                                    <div class="col-9">
										<label for="description" class="form-label">Category Description</label>
										<textarea class="form-control" name="description" id="description" placeholder="description..." rows="3">@if(!empty($categorydata['description'])) {{$categorydata['description']}} @else {{ old('description')}} @endif</textarea>
									</div>
                                    <div class="col-9">
										<label for="meta_title" class="form-label">Meta Title</label>
										<textarea class="form-control" name="meta_title" id="meta_title" placeholder="meta_title..." rows="3">@if(!empty($categorydata['meta_title'])) {{$categorydata['meta_title']}} @else {{ old('meta_title')}} @endif</textarea>
									</div>
                                    <div class="col-9">
										<label for="meta_description" class="form-label">Meta Description</label>
										<textarea class="form-control" name="meta_description" id="meta_description" placeholder="meta_description..." rows="3">@if(!empty($categorydata['meta_description'])) {{$categorydata['meta_description']}} @else {{ old('meta_description')}} @endif</textarea>
									</div>
                                    <div class="col-9">
										<label for="meta_keywords" class="form-label">Meta Keywords</label>
										<textarea class="form-control" name="meta_keywords" id="meta_keywords" placeholder="meta_keywords..." rows="3">@if(!empty($categorydata['meta_keywords'])) {{$categorydata['meta_keywords']}} @else {{ old('meta_keywords')}} @endif</textarea>
									</div>
                                        <div class="row mb-3">
											<div class="col-sm-9 text-secondary">
                                                <label for="formFile" class="form-label">Category Image</label>
                                                <input class="form-control" name="image" type="file" id="formFile">
											</div>
                                            @if(!empty($categorydata['image']))
                                            <div style="height: 90px;">
                                                <img style="width: 80px; margin-top: 5px;" src="{{asset('backEnd/images/category_image/'.$categorydata['image'])}}" >
                                                &nbsp;
	                    		                <a class="confirmDelete" record="category-image" recoedid="{{$categorydata['id']}}" href="javascript:void('0')">Delete</a>
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
@section('script_js')
<script src="{{asset('backEnd/plugins/select2/js/select2.min.js')}}"></script>
<script>
		$('.section-select').select2({
			theme: 'bootstrap4',
			width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
			placeholder: $(this).data('placeholder'),
			allowClear: Boolean($(this).data('allow-clear')),
		});
        $('.appendcategory-select').select2({
			theme: 'bootstrap4',
			width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
			placeholder: $(this).data('placeholder'),
			allowClear: Boolean($(this).data('allow-clear')),
		});
	</script>
@endsection
