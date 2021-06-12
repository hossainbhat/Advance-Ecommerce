  @extends("layouts.admin_layout.admin_layout")
    @section('title','Add/Edit Product Image')
  @section("content")
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{{ $title }}</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">{{ $title }}</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">{{ $title }}</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
            </div>
          </div>
          <div class="card-body">
              @if ($errors->any())
                <div class="alert alert-danger" style="margin-top: 10px;">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
              @endif
              @if(Session::has('success_message'))
              <div class="alert alert-success alert-dismissible fade show" role="alert" style="margin-top: 10px;">
                {{Session::get('success_message')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              @endif
              @if(Session::has('error_message'))
              <div class="alert alert-danger alert-dismissible fade show" role="alert" style="margin-top: 10px;">
                {{Session::get('error_message')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              @endif
            <form name="productimageForm" id="productimageForm"  action="{{url('admin/add-edit-product-image/'.$product->id)}}"  method="post" enctype="multipart/form-data">
              @csrf
              <!-- <input type="hidden" name="product_id"  value="{{ $product->id }}"> -->
              <div class="row">
                <div class="col-md-6">

                  <div class="form-group">
                      <label for="product_name">Product Name : </label>&nbsp;&nbsp;{{$product['product_name']}}
                   </div>
                  <div class="form-group">
                      <label for="product_code">Product Code : </label>&nbsp;&nbsp;{{$product['product_code']}}
                   </div>
                   <div class="form-group">
                      <label for="product_color">Product Color : </label>&nbsp;&nbsp;{{$product['product_color']}}
                   </div>

             </div>
             <div class="col-md-6">
                <div class="form-group">
                  <?php $product_image_path = "images/products/small/".$product->main_image;?>
                      @if(!empty($product->main_image) && file_exists($product_image_path))
                      <img style="width: 150px; margin-top: 5px;" src="{{asset('images/products/small/'.$product->main_image)}}">
                      @else
                      <img style="width: 150px; margin-top: 5px;" src="{{asset('images/products/small/no-image.png')}}">
                      @endif
                   </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                    <label for="images">File input</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="images[]" class="custom-file-input" id="images">
                        <label class="custom-file-label" for="images">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text" id="">Upload</span>
                      </div>
                    </div>
                  </div>

              </div>

              <div class="card-footer">
                    <button type="submit" class="btn btn-primary btn-sm">Add Image</button>
              </div>
              </div>

            </form>
              <div class="card">
              <div class="card-header">
                <h3 class="card-title">Add Product Image</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="product" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th width="10%">Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($product['ProductImage'] as $ProImage)
                  <input style="display: none;" type="text" name="ProImageId[]" value="{{$ProImage['id']}}">
                  <tr>
                    <td>{{$ProImage['id']}}</td>
                    <td><img style="width: 150px; margin-top: 5px;" src="{{asset('images/products/small/'.$ProImage->image)}}"></td>
                    <td>
                      @if($ProImage->status ==1)
                        <a class="updateImageStatus" id="image-{{$ProImage->id}}" image_id="{{$ProImage->id}}" href="javascript:void(0)"><i class="fa fa-toggle-on" aria-hidden="true" Status="Active"></i></a>
                      @else
                        <a class="updateImageStatus" id="image-{{$ProImage->id}}" image_id="{{$ProImage->id}}" href="javascript:void(0)"><i class="fa fa-toggle-off" aria-hidden="true" Status="Inactive"></i></a>
                      @endif
                      &nbsp;&nbsp;<a style="color:red;" title="Image Delette" class="confirmDelete" record="proImages" recoedid="{{$ProImage->id}}" href="javascript:void('0')"><i class="fas fa-trash-restore-alt"></i></a>
                    </td>

                  </tr>
                  @endforeach
                  </tbody>
                </table>
              </div>
            </div>
            <!-- /.row -->
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

  @endsection
