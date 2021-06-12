  @extends("layouts.admin_layout.admin_layout")
    @section('title','Chenge Password')
  @section("content")
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Settings</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Settings</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Settings</h3>
              </div>
              <!-- /.card-header -->
              @if(Session::has('error_message'))
              <div class="alert alert-danger alert-dismissible fade show" role="alert" style="margin-top: 10px;">
                {{Session::get('error_message')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
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
              <!-- form start -->
              <form role="form" action="{{ url('/admin/update-pwd') }}" method="post" name="settings" id="settings">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" readonly class="form-control" id="email" value="{{ $adminDetails->email }}">
                  </div>
                  <div class="form-group">
                    <label for="type">Type</label>
                    <input type="text" name="type" readonly class="form-control" id="type" value="{{ $adminDetails->type }}">
                  </div>
                  <div class="form-group">
                    <label for="current_pwd">Current Password</label>
                    <input type="password" name="current_pwd" required class="form-control" id="current_pwd" placeholder="Current Password">
                    <span id="chkPwd"></span>
                  </div>
                  <div class="form-group">
                    <label for="new_pwd">New  Password</label>
                    <input type="password" name="new_pwd" required class="form-control" id="new_pwd" placeholder="New Password">
                  </div>
                  <div class="form-group">
                    <label for="confirm_pwd">Confirm Password</label>
                    <input type="password" required name="confirm_pwd" class="form-control" id="confirm_pwd" placeholder="Password">
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->


          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  @endsection
