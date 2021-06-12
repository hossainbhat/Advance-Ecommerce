  @extends("layouts.admin_layout.admin_layout")
  @section("content")
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{{ $name }}</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">{{ $name }}</li>
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
            <h3 class="card-title">{{ $name }}</h3>
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
          	<form name="bannerForm" id="bannerForm" @if(empty($bannerdata['id'])) action="{{url('admin/add-edit-banner')}}" @else   action="{{url('admin/add-edit-banner/'.$bannerdata['id'] )}}" @endif method="post" enctype="multipart/form-data">
          		@csrf
	            <div class="row">
	              <div class="col-md-6">
	              	<div class="form-group">
	                    <label for="link">link</label>
	                    <input type="text" name="link" class="form-control" id="link" placeholder="Enter banner link" @if(!empty($bannerdata['link'])) value="{{$bannerdata['link']}}" @else value="{{ old('link')}}" @endif>
	                 </div>

	                 <div class="form-group">
	                    <label for="title">Title</label>
	                    <input type="text" name="title" class="form-control" id="title" placeholder="Enter banner title"  @if(!empty($bannerdata['title'])) value="{{$bannerdata['title']}}" @else value="{{ old('title')}}" @endif>
	                 </div>
	                 <div class="form-group">
	                    <label for="alt">Alt</label>
	                    <input type="text" name="alt" class="form-control" id="alt" placeholder="Enter banner alt"  @if(!empty($bannerdata['alt'])) value="{{$bannerdata['alt']}}" @else value="{{ old('alt')}}" @endif>
	                 </div>

	                <div class="form-group">
	                    <label for="image">banner Image</label><br>
                      <small>Image size is 1170 * 480</small>
	                    <div class="input-group">
	                      <div class="custom-file">
	                        <input type="file" name="image" class="custom-file-input" id="image">
	                        <label class="custom-file-label" for="image">Choose file</label>
	                      </div>
	                      <div class="input-group-append">
	                        <span class="input-group-text" id="">Upload</span>
	                      </div>
	                    </div>
	                    @if(!empty($bannerdata['image']))
	                    	<div style="height: 90px;">
	                    		<img style="width: 80px; margin-top: 5px;" src="{{asset('images/banners/'.$bannerdata['image'])}}" >
	                    		&nbsp;
	                    		<a class="confirmDelete" record="banner-image" recoedid="{{$bannerdata['id']}}" href="javascript:void('0')">Delete</a>
	                    	</div>
	                    @endif
	                  </div>

	              </div>

	              </div>
	              <div class="card-footer">
	                  <button type="submit" class="btn btn-primary">Submit</button>
	              </div>
	              <!-- /.col -->
	            </div>
            </form>
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
