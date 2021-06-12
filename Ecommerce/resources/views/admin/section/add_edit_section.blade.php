  @extends("layouts.admin_layout.admin_layout")
  @section('title','Add/Edit Section')
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
          	<form name="sectionForm" id="sectionForm" @if(empty($sectiondata['id'])) action="{{url('admin/add-edit-section')}}" @else   action="{{url('admin/add-edit-section/'.$sectiondata['id'] )}}" @endif method="post">
          		@csrf
	            <div class="row">
	              <div class="col-md-6">
	              	<div class="form-group">
	                    <label for="name">Section Name</label>
	                    <input type="text" name="name" class="form-control" id="name" placeholder="Enter Section Name" @if(!empty($sectiondata['name'])) value="{{$sectiondata['name']}}" @else value="{{ old('name')}}" @endif>
	                 </div>
	                 <div class="card-footer">
	                  <button type="submit" class="btn btn-primary">Submit</button>
	              </div>
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
