  @extends("layouts.admin_layout.admin_layout")
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
              <li class="breadcrumb-item active">Banners</li>
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
                <h3 class="card-title">Banners</h3>
                <a href="{{url('admin/add-edit-banner')}}" class="btn btn-success btn-sm" style="float: right;">Add Banner</a>
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
                <table id="banner" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Link</th>
                    <th>Title</th>
                    <th>Alt</th>
                    <th width="10%">Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($banners as $banner)
                  <tr>
                    <td>{{$banner->id}}</td>
                    <td><img width="120" src="{{asset('images/banners/'.$banner->image)}}"></td>
                    <td>{{$banner->link}}</td>
                    <td>{{$banner->title}}</td>
                    <td>{{$banner->alt}}</td>
                    <td>
                      @if($banner->status ==1)
                        <a class="updateBannerStatus" id="banner-{{$banner->id}}" banner_id="{{$banner->id}}" href="javascript:void(0)"><i class="fa fa-toggle-on" aria-hidden="true" Status="Active"></i></a>
                      @else
                        <a class="updateBannerStatus" id="banner-{{$banner->id}}" banner_id="{{$banner->id}}" href="javascript:void(0)"><i class="fa fa-toggle-off" aria-hidden="true" Status="Inactive"></i></a>
                      @endif
                      &nbsp;&nbsp;
                      <a href="{{url('admin/add-edit-banner/'.$banner->id )}}"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;<a
                     class="confirmDelete" record="banner" recoedid="{{$banner->id}}" href="javascript:void('0')"><i style="color:red;" class="fa fa-trash"></i></a>
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
