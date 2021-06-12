  @extends("layouts.admin_layout.admin_layout")
    @section('title','Add/Edit Category')
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
          	<form name="categoryForm" id="categoryForm" @if(empty($categorydata['id'])) action="{{url('admin/add-edit-category')}}" @else   action="{{url('admin/add-edit-category/'.$categorydata['id'] )}}" @endif method="post" enctype="multipart/form-data">
          		@csrf
	            <div class="row">
	              <div class="col-md-6">
	              	<div class="form-group">
	                    <label for="name">Category Name</label>
	                    <input type="text" name="name" class="form-control" id="name" placeholder="Enter Category Name" @if(!empty($categorydata['name'])) value="{{$categorydata['name']}}" @else value="{{ old('name')}}" @endif>
	                 </div>
	                <div id="appendCategoriesLevel">
	                	@include("admin.category.append_categories")
	                </div>
	                 <div class="form-group">
	                    <label for="discount">Category Discount</label>
	                    <input type="text" name="discount" class="form-control" id="discount" placeholder="Enter Category discount"  @if(!empty($categorydata['discount'])) value="{{$categorydata['discount']}}" @else value="{{ old('discount')}}" @endif>
	                 </div>

					<div class="form-group">
	                    <label>Category Description</label>
	                    <textarea class="form-control" name="description" id="description" rows="3" placeholder="Enter ...">@if(!empty($categorydata['description'])) {{$categorydata['description']}} @else {{ old('description')}} @endif</textarea>
	                 </div>
					<div class="form-group">
	                    <label>Meta Description</label>
	                    <textarea class="form-control" name="meta_description" id="meta_description" rows="3" placeholder="Enter ...">@if(!empty($categorydata['meta_description'])) {{$categorydata['meta_description']}} @else {{ old('meta_description')}} @endif</textarea>
	                 </div>
	              </div>
	              <div class="col-md-6">
	              	<div class="form-group">
	                  <label>Select Section</label>
	                  <select name="section_id" id="section_id" class="form-control select2" style="width: 100%;">
	                    <option value="0">Select</option>
	                    @foreach($sections as $section)
	                    	<option value="{{$section->id}}" @if(!empty($categorydata['section_id']) && $categorydata['section_id'] == $section->id ) selected @endif > {{$section->name}} </option>
	                    @endforeach
	                  </select>
	                </div>
	                <div class="form-group">
	                    <label for="image">Category Image</label>
	                    <div class="input-group">
	                      <div class="custom-file">
	                        <input type="file" name="image" class="custom-file-input" id="image">
	                        <label class="custom-file-label" for="image">Choose file</label>
	                      </div>
	                      <div class="input-group-append">
	                        <span class="input-group-text" id="">Upload</span>
	                      </div>
	                    </div>
	                    @if(!empty($categorydata['image']))
	                    	<div style="height: 90px;">
	                    		<img style="width: 80px; margin-top: 5px;" src="{{asset('images/category_img/'.$categorydata['image'])}}" >
	                    		&nbsp;<!-- <a href="{{url('admin/delete-category-image/'.$categorydata['id'])}}" >Delete</a> -->
	                    		<a class="confirmDelete" record="category-image" recoedid="{{$categorydata['id']}}" href="javascript:void('0')">Delete</a>
	                    	</div>
	                    @endif
	                  </div>
	                  <div class="form-group">
	                    <label for="url">Category Url</label>
	                    <input type="text" name="url" class="form-control" id="url" placeholder="Enter Category url" @if(!empty($categorydata['url'])) value="{{$categorydata['url']}}" @else value="{{ old('url')}}" @endif>
	                 </div>
					<div class="form-group">
	                    <label>Meta Title</label>
	                    <textarea class="form-control" name="meta_title" id="meta_title" rows="3" placeholder="Enter ...">@if(!empty($categorydata['meta_title'])) {{$categorydata['meta_title']}} @else {{ old('meta_title')}} @endif</textarea>
	                 </div>
	                 <div class="form-group">
	                    <label>Meta Keywords</label>
	                    <textarea name="meta_keywords" id="meta_keywords" class="form-control" rows="3" placeholder="Enter ...">@if(!empty($categorydata['meta_keywords'])) {{$categorydata['meta_keywords']}} @else {{ old('meta_keywords')}} @endif</textarea>
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
