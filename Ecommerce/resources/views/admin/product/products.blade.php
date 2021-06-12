  @extends("layouts.admin_layout.admin_layout")
    @section('title','Product')
  @section("content")

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Catalogues</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Products</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Products</h3>
                <a href="{{url('admin/add-edit-product')}}" class="btn btn-success btn-sm" style="float: right;">Add Product</a>
              </div>
               @if(Session::has('success_message'))
              <div class="alert alert-success alert-dismissible fade show" role="alert" style="margin-top: 10px;">
                {{Session::get('success_message')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              @endif
              <!-- /.card-header -->
              <div class="card-body">
                <table id="product" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Section</th>
                    <th>Category</th>
                    <th>Name</th>
                    <th>Code</th>
                    <th>Color</th>
                    <th>Product Image</th>
                    <th width="15%">Action</th>
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
                      <?php $product_image_path = "images/products/small/".$product->main_image;?>
                      @if(!empty($product->main_image) && file_exists($product_image_path))
                      <img width="100px" src="{{asset('images/products/small/'.$product->main_image)}}">
                      @else
                      <img width="100px" src="{{asset('images/products/small/no-image.png')}}">
                      @endif
                    </td>
                    <td>
                      @if($product->status ==1)
                    		<a class="updateProductStatus" id="product-{{$product->id}}" product_id="{{$product->id}}" href="javascript:void(0)"><i class="fa fa-toggle-on" aria-hidden="true" Status="Active"></i></a>
                    	@else
                    		<a class="updateProductStatus" id="product-{{$product->id}}" product_id="{{$product->id}}" href="javascript:void(0)"><i class="fa fa-toggle-off" aria-hidden="true" Status="Inactive"></i></a>
                    	@endif
                      &nbsp;&nbsp;
                      <a title="Product Attribute Image" href="{{url('admin/add-edit-product-image/'.$product->id )}}"><i style="color:green;" class="fas fa-plus"></i></a>

                      &nbsp;&nbsp;<a title="Product Attributes" href="{{url('admin/add-edit-product-attribute/'.$product->id )}}"><i class="fas fa-plus-circle"></i></a>

                      &nbsp;&nbsp;<a title="Edit Product" href="{{url('admin/add-edit-product/'.$product->id )}}"><i class="fas fa-edit"></i></a>

                      &nbsp;&nbsp;<a title="Product Delette" class="confirmDelete" record="product" recoedid="{{$product->id}}" href="javascript:void('0')"><i style="color:red;" class="fas fa-trash-restore-alt"></i></a>
                   </td>

                  </tr>
                  @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  @endsection
