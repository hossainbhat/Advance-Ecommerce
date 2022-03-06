@extends("layouts.admin_layouts.admin_layout")
@section('title','Product List')
@section('script_css')
<link href="{{asset('backEnd/plugins/datatable/css/dataTables.bootstrap5.min.css')}}" rel="stylesheet" />
@endsection
@section("content")
		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				<h6 class="mb-0 text-uppercase">Product List</h6>
				<a style="float: right; margin-top: -30px;" href="{{url('admin/add-edit-product')}}"><button type="button" class="btn btn-success btn-sm"> Create Product<i class="lni lni-circle-plus"></i></button></a>
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
										<th>SL#</th>
                                        <th>Section</th>
                                        <th>Category</th>
                                        <th>Name</th>
                                        <th>Code</th>
                                        <th>Color</th>
                                        <th>Image</th>
										<th>Status</th>
										<th width="10%">Modify</th>
									</tr>
								</thead>
								<tbody>
                                @foreach($products as $product)
                                    <tr>
                                        <td>{{$product->id}}</td>
                                        <td>{{$product->section['name']}}</td>
                                        <td>{{$product->category['name']}}</td>
                                        <td>{{$product->product_name}}</td>
                                        <td>{{$product['product_code']}}</td>
                                        <td>{{$product['product_color']}}</td>
										<td>
											<?php $product_image_path = "backEnd/images/products/small/".$product->main_image;?>
											@if(!empty($product->main_image) && file_exists($product_image_path))
											<img width="80px" src="{{asset('backEnd/images/products/small/'.$product->main_image)}}">
											@else
											<img width="80px" src="{{asset('backEnd/images/products/small/no-image.png')}}">
											@endif
										</td>
										<td>
											@if($product['status'] ==1)
												<a class="updateProductStatus" id="product-{{$product->id}}" product_id="{{$product->id}}" href="javascript:void(0)">Active</a>  
											@else
												<a class="updateProductStatus" id="product-{{$product->id}}" product_id="{{$product->id}}" href="javascript:void(0)">Inactive</a>  
											@endif
										</td>
										<td>
											<a href="{{url('admin/add-edit-product/'.$product['id'])}}" title="Edit Product"><button type="button" class="btn btn-success btn-sm"><i class="fadeIn animated bx bx-edit"></i></button></a>  
											<a href="{{url('admin/add-edit-product-image/'.$product['id'])}}" title="Product Image"><button type="button" class="btn btn-info btn-sm"><i class="fadeIn animated bx bx-images"></i></button></a>  
											<a href="{{url('admin/add-edit-product-attribute/'.$product['id'] )}}" title="Product Attribute"><button type="button" class="btn btn-warning btn-sm"><i class="fadeIn animated bx bx-edit"></i></button></a>  

											<a class="confirmDelete btn btn-danger btn-sm" record="product" recoedid="{{$product->id}}" href="javascript:void('0')" style="font-size: 16px;"><i class="fadeIn animated bx bx-trash-alt"></i></a>
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