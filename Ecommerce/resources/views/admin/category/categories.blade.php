  @extends("layouts.admin_layout.admin_layout")
    @section('title','Category')
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
              <li class="breadcrumb-item active">Categories</li>
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
                <h3 class="card-title">Categories</h3>
                <a href="{{url('admin/add-edit-category')}}" class="btn btn-success btn-sm" style="float: right;">Add Category</a>
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
                <table id="category" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Section Name</th>
                    <th>Parent Category</th>
                    <th>Category Name</th>
                    <th>Url</th>
                    <th width="10%">Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($categories as $category)
                  @if(!isset($category->parentcategory->name))
                    <?php $parent_category = "Root"; ?>
                  @else
                    <?php $parent_category = $category->parentcategory->name; ?>
                  @endif
                  <tr>
                    <td>{{$category->id}}</td>
                    <td>{{$category->section['name']}}</td>
                    <td>{{$parent_category}}</td>
                    <td>{{$category['name']}}</td>
                    <td>{{$category['url']}}</td>
                    <td>
                      @if($category->status ==1)
                        <a class="updateCategoryStatus" id="category-{{$category->id}}" category_id="{{$category->id}}" href="javascript:void(0)"><i class="fa fa-toggle-on" aria-hidden="true" Status="Active"></i></a>
                      @else
                        <a class="updateCategoryStatus" id="category-{{$category->id}}" category_id="{{$category->id}}" href="javascript:void(0)"><i class="fa fa-toggle-off" aria-hidden="true" Status="Inactive"></i></a>
                      @endif
                      &nbsp;&nbsp;
                      <a href="{{url('admin/add-edit-category/'.$category->id )}}"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;<a
                     class="confirmDelete" record="category" recoedid="{{$category->id}}" href="javascript:void('0')"><i style="color:red;" class="fa fa-trash"></i></a>

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
