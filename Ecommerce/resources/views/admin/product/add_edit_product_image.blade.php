@extends("layouts.admin_layouts.admin_layout")
@section('title',$name)
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
                                @if(Session::has('success_message'))
											<div class="alert alert-success border-0 bg-success alert-dismissible fade show">
												<div class="text-white">{{Session::get('success_message')}}</div>
												<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
											</div>
										@endif
								<form class="row g-3 needs-validation" action="{{url('admin/add-edit-product-image/'.$product->id)}}"  method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="col-md-6">
										<div class="col-md-6">
											<label for="product_name" class="form-label">Product Name</label>
                                            <input type="text" readonly class="form-control" value="{{$product['product_name']}}"  >

										</div>
                                        <div class="col-md-6">
                                        <label for="product_name" class="form-label">Product Price</label>
                                            <input type="text" readonly class="form-control" value="{{$product['product_price']}}"  >
										</div>
                                        <div class="col-md-6">
                                        <label for="product_name" class="form-label">Product Code</label>
                                            <input type="text" readonly class="form-control" value="{{$product['product_code']}}"  >
										</div>
                                        <div class="col-md-6">
                                        <label for="product_name" class="form-label">Product Color</label>
                                            <input type="text" readonly class="form-control" value="{{$product['product_color']}}"  >
										</div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <?php $product_image_path = "backEnd/images/products/small/".$product->main_image;?>
                                            @if(!empty($product->main_image) && file_exists($product_image_path))
                                            <img style="width: 150px; margin-top: 5px;" src="{{asset('backEnd/images/products/small/'.$product->main_image)}}">
                                            @else
                                            <img style="width: 150px; margin-top: 5px;" src="{{asset('backEnd/images/products/small/no-image.png')}}">
                                            @endif
                                        </div>
                                       
                                    </div>
                                        <div class="col-md-12">

                                            <div class="col-sm-9 text-secondary">
                                                <label for="formFile" class="form-label">Category Image</label>
                                                <input class="form-control" name="images[]" type="file" id="formFile">
                                            </div>

                                        </div>
										<div class="col-12">
											<button class="btn btn-success btn-sm" type="submit">Add Image</button>
										</div>
								</form>
                                    
								</div>
							</div>
					<div class="card-body">
						<div class="table-responsive">
						  
							<table id="example" class="table table-striped table-bordered" style="width:100%">
								<thead>
									<tr>
                                    <th>ID</th>
                                    <th>Image</th>
                                    <th width="15%">Action</th>
									</tr>
								</thead>
								<tbody>
                                @foreach($product['ProductImage'] as $ProImage)
                                <input style="display: none;" type="text" name="ProImageId[]" value="{{$ProImage['id']}}">
                                <tr>
                                    <td>{{$ProImage['id']}}</td>
                                    <td><img style="width: 100px; margin-top: 5px;" src="{{asset('backEnd/images/products/small/'.$ProImage->image)}}"></td>
                                    <td>
                                    @if($ProImage->status ==1)
                                        <a class="updateImageStatus" id="image-{{$ProImage->id}}" image_id="{{$ProImage->id}}" href="javascript:void(0)">Active</a>  

                                    @else
                                    <a class="updateImageStatus" id="image-{{$ProImage->id}}" image_id="{{$ProImage->id}}" href="javascript:void(0)">Inactive</a>  

                                    @endif
                                    &nbsp;&nbsp;<a title="Image Delette" class="confirmDelete btn btn-danger btn-sm" record="proImages" recoedid="{{$ProImage->id}}" href="javascript:void('0')"><i class="fadeIn animated bx bx-trash-alt"></i></a>
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
				<!--end row-->
			</div>
		</div>	
@endsection
@section("script_js")


@endsection

