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
										@if ($errors->any())
											<div class="alert alert-danger">
												<ul>
													@foreach ($errors->all() as $error)
														<li>{{ $error }}</li>
													@endforeach
												</ul>
											</div>
										@endif
									<form class="row g-3 needs-validation" action="{{url('admin/add-edit-product-attribute/'.$product->id)}}"  method="post">
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
                                    <div class="form-group">
                                        <div class="field_wrapper">
                                            <div>
                                                <input  type="text" name="size[]" required id="size" value="" placeholder="size" style="width:115px;"/>
                                                <input type="number" name="price[]" required id="price" value="" placeholder="price" style="width:115px;"/>
                                                <input type="number" name="stock[]" id="stock" required value="" placeholder="stock" style="width:115px;"/>
                                                <input type="text" name="sku[]" id="sku" value="" required placeholder="sku" style="width:115px;"/>
                                                <a href="javascript:void(0);" class="add_button" title="Add field">Add</a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
										<div class="col-12">
											<button class="btn btn-success btn-sm" type="submit">Add Attribute</button>
										</div>
									</form>
                                    
								</div>
							</div>
						</div>
                        <div class="card">

                <form name="editAttributeForm" id="editAttributeForm"  action="{{url('admin/edit-attribute/'.$product->id)}}"  method="post">
                        @csrf
					<div class="card-body">
						<div class="table-responsive">
						  
							<table id="example" class="table table-striped table-bordered" style="width:100%">
								<thead>
									<tr>
                                        <th>ID</th>
                                        <th>Size</th>
                                        <th>Sku</th>
                                        <th>Price</th>
                                        <th>Stock</th>
                                        <th>Action</th>
									</tr>
								</thead>
								<tbody>
                                @foreach($product['attributes'] as $attr)
                                    <input style="display: none;" type="text" name="attrId[]" value="{{$attr['id']}}">
                                    <tr>
                                        <td>{{$attr['id']}}</td>
                                        <td>{{$attr['size']}}</td>
                                        <td>{{$attr['sku']}}</td>
                                        <td>
                                            <input type="number" name="price[]" value="{{$attr['price']}}" required="">
                                        </td>
                                        <td>
                                            <input type="number" name="stock[]" value="{{$attr['stock']}}" required="">
                                        </td>

                                        <td>
                                        
                                        @if($attr->status ==1)
												<a class="updateAttributeStatus" id="attribute-{{$attr->id}}" attribute_id="{{$attr->id}}" href="javascript:void(0)">Active</a>  
											@else
												<a class="updateAttributeStatus" id="attribute-{{$attr->id}}" attribute_id="{{$attr->id}}" href="javascript:void(0)">Inactive</a>  
											@endif
                                        &nbsp;&nbsp;<a  title="Attribute Delette" class="confirmDelete btn btn-danger btn-sm" record="attribute" recoedid="{{$attr->id}}" href="javascript:void('0')"><i class="fadeIn animated bx bx-trash-alt"></i></a>
                                        </td>

                                    </tr>
                                    @endforeach
									
								</tbody>
                                
							</table>
                            <div class="card-footer">
                            <button type="submit" class="btn btn-primary btn-sm">Update Attribute</button>
                        </div>
						</div>
                        
					</div>
                </form>
				</div>
					</div>
				</div>
				<!--end row-->
			</div>
		</div>	
@endsection
@section("script_js")

<script>
    	//add remove product attrbutes
	 var maxField = 10; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('.field_wrapper'); //Input field wrapper
    var fieldHTML = '<div style="margin-top:10px;"><div style="height:10px;"></div><input type="text" name="size[]" required placeholder="size" style="width:115px;"/>&nbsp;<input type="number" name="price[]" required placeholder="price" style="width:115px;"/>&nbsp;<input type="number" name="stock[]" required placeholder="stock" style="width:115px;"/>&nbsp;<input type="text" name="sku[]" required placeholder="sku" style="width:115px;"/><a href="javascript:void(0);" class="remove_button">Delete</a></div>'; //New input field html
    var x = 1; //Initial field counter is 1

    //Once add button is clicked
    $(addButton).click(function(){
        //Check maximum number of input fields
        if(x < maxField){
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); //Add field html
        }
    });

    //Once remove button is clicked
    $(wrapper).on('click', '.remove_button', function(e){
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });
</script>
@endsection

