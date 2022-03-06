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
					<div class="col-xl-12 mx-auto">
						<h6 class="mb-0 text-uppercase">{{$name}}</h6>                        
						<a href="{{url('admin/products')}}" style="float:right; margin-top:-30px;"><button class="btn btn-sm btn-success">Product List <i class="lni lni-list"></i></button></a>

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
									<form class="row g-3 needs-validation"  method="post" enctype="multipart/form-data">
                                    @csrf
                                    
                                        <div class="col-md-6">
                                            <div class="mb-3" data-select2-id="21">
										        <label class="form-label">Brand Name</label>
                                                <select name="brand_id" id="brand_id" class="brand-select select2-hidden-accessible" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                                <option value="0">Select</option>
												@foreach($brands as $brand)
													<option value="{{$brand['id']}}" @if(!empty($productdata['brand_id']) && $productdata['brand_id'] == $brand['id']) selected="" @endif>{{$brand['name']}}</option>
												@endforeach
                                                </select>
								            </div>
                                        </div>
										<div class="col-md-6">
                                            <div class="mb-3" data-select2-id="21">
										        <label class="form-label">Category Name</label>
                                                <select name="category_id" id="category_id" class="category-select select2-hidden-accessible" data-select2-id="5" tabindex="-5" aria-hidden="true">
                                                <option value="0">Select</option>
												@foreach($categories as $section)
													<optgroup label="{{ $section['name'] }}"></optgroup>	 
													@foreach($section['categories'] as $category)
														<option value="{{$category['id']}}" @if(!empty(@old('category_id')) && $category['id'] == @old('category_id')) selected=""  @elseif(!empty($productdata['category_id']) && $productdata['category_id'] == $category['id']) selected="" @endif>&nbsp;&nbsp;--&nbsp;{{ $category['name'] }}</option>
														@foreach($category['subcategories'] as $subcategory)
															<option value="{{$subcategory['id']}}" @if(!empty(@old('category_id')) && $subcategory['id'] ==@old('category_id')) selected="" @elseif(!empty($productdata['category_id']) && $productdata['category_id'] == $subcategory['id']) selected="" @endif>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;{{ $subcategory['name'] }}</option>
														@endforeach
													@endforeach
												@endforeach
                                                </select>
								            </div>
                                        </div>
                                        <div class="col-md-6">
											<label for="product_name" class="form-label">Product Name</label>
											<input type="text" name="product_name" class="form-control" id="product_name" placeholder="Enter product_name" @if(!empty($productdata['product_name'])) value="{{$productdata['product_name']}}" @else value="{{ old('product_name')}}" @endif>
										</div>
										<div class="col-md-6">
											<label for="product_code" class="form-label">Product Code</label>
											<input type="text" name="product_code" class="form-control" id="product_code" placeholder="Enter product_code" @if(!empty($productdata['product_code'])) value="{{$productdata['product_code']}}" @else value="{{ old('product_code')}}" @endif>
										</div>
                                        <div class="col-md-6">
											<label for="product_price" class="form-label">Product Price</label>
											<input type="text" name="product_price" class="form-control" id="product_price" placeholder="Enter product_price" @if(!empty($productdata['product_price'])) value="{{$productdata['product_price']}}" @else value="{{ old('product_price')}}" @endif>
										</div>
                                        <div class="col-md-6">
											<label for="product_color" class="form-label">Product Color</label>
											<input type="text" name="product_color" class="form-control" id="product_color" placeholder="Enter product_color" @if(!empty($productdata['product_color'])) value="{{$productdata['product_color']}}" @else value="{{ old('product_color')}}" @endif>
										</div>
                                        <div class="col-md-6">
											<label for="product_discount" class="form-label">Product Discount(%)</label>
											<input type="text" name="product_discount" class="form-control" id="product_discount" placeholder="Enter product_discount" @if(!empty($productdata['product_discount'])) value="{{$productdata['product_discount']}}" @else value="{{ old('product_discount')}}" @endif>
										</div>
                                        <div class="col-md-6">
											<label for="product_weight" class="form-label">Product Weight(gm)</label>
											<input type="text" name="product_weight" class="form-control" id="product_weight" placeholder="Enter product_weight" @if(!empty($productdata['product_weight'])) value="{{$productdata['product_weight']}}" @else value="{{ old('product_weight')}}" @endif>
										</div>
                                        <div class="col-md-6">
                                            <div class="mb-3" data-select2-id="21">
										        <label class="form-label">Sleeve Name</label>
                                                <select name="sleeve" id="sleeve" class="sleeve-select select2-hidden-accessible" data-select2-id="2" tabindex="-2" aria-hidden="true">
                                                <option value="0">Select</option>
												@foreach($sleeveArray as $sleeve)
													<option value="{{$sleeve}}" @if(!empty($productdata['sleeve']) && $productdata['sleeve'] == $sleeve) selected="" @endif>{{$sleeve}}</option>
												@endforeach
                                                </select>
								            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3" data-select2-id="21">
										        <label class="form-label">Fabric Name</label>
                                                <select name="fabric" id="fabric" class="fabric-select select2-hidden-accessible" data-select2-id="6" tabindex="-6" aria-hidden="true">
                                                <option value="0">Select</option>
												@foreach($fabricArray as $fabric)
													<option value="{{$fabric}}" @if(!empty($productdata['fabric']) && $productdata['fabric'] == $fabric) selected="" @endif>{{$fabric}}</option>
												@endforeach
                                                </select>
								            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3" data-select2-id="21">
										        <label class="form-label">Pattern Name</label>
                                                <select name="pattern" id="pattern" class="pattern-select select2-hidden-accessible" data-select2-id="7" tabindex="-7" aria-hidden="true">
                                                <option value="0">Select</option>
												@foreach($patternArray as $pattern)
													<option value="{{$pattern}}" @if(!empty($productdata['pattern']) && $productdata['pattern'] == $pattern) selected="" @endif>{{$pattern}}</option>
												@endforeach
                                                </select>
								            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3" data-select2-id="21">
										        <label class="form-label">Fit Name</label>
                                                <select name="fit" id="fit" class="fit-select select2-hidden-accessible" data-select2-id="3" tabindex="-3" aria-hidden="true">
                                                <option value="0">Select</option>
												@foreach($fitArray as $fit)
													<option value="{{$fit}}"  @if(!empty($productdata['fit']) && $productdata['fit'] == $fit) selected="" @endif>{{$fit}}</option>
												@endforeach
                                                </select>
								            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3" data-select2-id="21">
										        <label class="form-label">Occasion Name</label>
                                                <select name="occasion" id="occasion" class="occasion-select select2-hidden-accessible" data-select2-id="4" tabindex="-4" aria-hidden="true">
                                                <option value="0">Select</option>
												@foreach($occsionArray as $occasion)
													<option value="{{$occasion}}" @if(!empty($productdata['occasion']) && $productdata['occasion'] == $occasion) selected="" @endif>{{$occasion}}</option>
												@endforeach
                                                </select>
								            </div>
                                        </div>
                                       
                                        <div class="col-md-6">
                                            <label for="main_image" class="form-label">Product Image</label>
                                            <input class="form-control" name="main_image" type="file" id="main_image"> 
											@if(!empty($productdata['main_image']))
											<div style="height: 90px;">
												<img style="width: 80px; margin-top: 5px;" src="{{asset('backend/images/products/small/'.$productdata['main_image'])}}" >
												&nbsp;
												<a class="confirmDelete" record="product-image" recoedid="{{$productdata['id']}}" href="javascript:void('0')">Delete</a>
											</div>
											@endif                
                                        </div>
                                        <div class="col-md-6">
                                            <label for="product_video" class="form-label">Product Video</label>
                                            <input class="form-control" name="product_video" type="file" id="product_video"> 
											@if(!empty($productdata['product_video']))
												<div><a href="{{url('videos/'.$productdata['product_video'])}}" download="">Download</a>&nbsp;|&nbsp;<a class="confirmDelete" record="product-video" recoedid="{{$productdata['id']}}" href="javascript:void('0')">Delete</a></div>
											@endif                
                                        </div>

                                        <div class="col-6">
                                            <label for="description" class="form-label">Product Description</label>
                                            <textarea class="form-control" name="description" id="description" placeholder="description..." rows="3">@if(!empty($productdata['description'])) {{$productdata['description']}} @else {{ old('description')}} @endif</textarea>
									    </div>
                                        <div class="col-6">
                                            <label for="wash_care" class="form-label">Wash Care</label>
                                            <textarea class="form-control" name="wash_care" id="wash_care" placeholder="wash_care..." rows="3">@if(!empty($productdata['wash_care'])) {{$productdata['wash_care']}} @else {{ old('wash_care')}} @endif</textarea>
									    </div>
                                        
                                        <div class="col-6">
                                            <label for="meta_title" class="form-label">Meta Title</label>
                                            <textarea class="form-control" name="meta_title" id="meta_title" placeholder="meta_title..." rows="3">@if(!empty($productdata['meta_title'])) {{$productdata['meta_title']}} @else {{ old('meta_title')}} @endif</textarea>
									    </div>
                                        <div class="col-6">
                                            <label for="meta_description" class="form-label">Meta Description</label>
                                            <textarea class="form-control" name="meta_description" id="meta_description" placeholder="meta_description..." rows="3">@if(!empty($productdata['meta_description'])) {{$productdata['meta_description']}} @else {{ old('meta_description')}} @endif</textarea>
									    </div>
										<div class="col-6">
                                            <label for="meta_keywords" class="form-label">Meta Keywords</label>
                                            <textarea class="form-control" name="meta_keywords" id="meta_keywords" placeholder="meta_keywords..." rows="3">@if(!empty($productdata['meta_keywords'])) {{$productdata['meta_keywords']}} @else {{ old('meta_keywords')}} @endif</textarea>
									    </div>
										<div class="form-group">
											<label for="is_featured">Featured</label>
											<input type="checkbox" name="is_featured" id="is_featured" value="Yes" @if(!empty($productdata['is_featured']) && $productdata['is_featured'] =="Yes") checked="" @endif>
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
		$('.brand-select').select2({
			theme: 'bootstrap4',
			width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
			placeholder: $(this).data('placeholder'),
			allowClear: Boolean($(this).data('allow-clear')),
		});
        $('.sleeve-select').select2({
			theme: 'bootstrap4',
			width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
			placeholder: $(this).data('placeholder'),
			allowClear: Boolean($(this).data('allow-clear')),
		});
        $('.fit-select').select2({
			theme: 'bootstrap4',
			width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
			placeholder: $(this).data('placeholder'),
			allowClear: Boolean($(this).data('allow-clear')),
		});
        $('.occasion-select').select2({
			theme: 'bootstrap4',
			width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
			placeholder: $(this).data('placeholder'),
			allowClear: Boolean($(this).data('allow-clear')),
		});
        $('.category-select').select2({
			theme: 'bootstrap4',
			width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
			placeholder: $(this).data('placeholder'),
			allowClear: Boolean($(this).data('allow-clear')),
		});
        $('.fabric-select').select2({
			theme: 'bootstrap4',
			width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
			placeholder: $(this).data('placeholder'),
			allowClear: Boolean($(this).data('allow-clear')),
		});
        $('.pattern-select').select2({
			theme: 'bootstrap4',
			width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
			placeholder: $(this).data('placeholder'),
			allowClear: Boolean($(this).data('allow-clear')),
		});
     
	</script>
@endsection
