@extends("layouts.admin_layouts.admin_layout")
@section('title',$name)
@section('content')
<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				
				<!--end breadcrumb-->
				<div class="row">
					<div class="col-xl-9 mx-auto">
						<h6 class="mb-0 text-uppercase">{{$name}}</h6>                        
						<a href="{{url('admin/cms-pages')}}" style="float:right; margin-top:-30px;"><button class="btn btn-sm btn-success">Cms Page List <i class="lni lni-list"></i></button></a>

						<hr>
						<div class="card">
							<div class="card-body">
								<div class="p-4 border rounded">
										@if(Session::has('error_message'))
											<div class="alert alert-danger border-0 bg-success alert-dismissible fade show">
												<div class="text-white">{{Session::get('error_message')}}</div>
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
									<form class="row g-3 needs-validation" @if(empty($cmsdata['id'])) action="{{url('admin/add-edit-cms')}}" @else   action="{{url('admin/add-edit-cms/'.$cmsdata['id'] )}}" @endif method="post">
                                    @csrf
                                    
										<div class="col-md-9">
											<label for="title" class="form-label">Title</label>
											<input type="text" name="title" class="form-control" id="title" placeholder="Enter title" @if(!empty($cmsdata['title'])) value="{{$cmsdata['title']}}" @else value="{{ old('title')}}" @endif>
										</div>
                                        <div class="col-md-9">
											<label for="url" class="form-label">Url</label>
											<input type="text" name="url" class="form-control" id="url" placeholder="Enter url" @if(!empty($cmsdata['url'])) value="{{$cmsdata['url']}}" @else value="{{ old('url')}}" @endif>
										</div>
                                        <div class="col-9">
										    <label for="description" class="form-label">Description</label>
                                            <textarea class="form-control" id="editor" name="description"  placeholder="description..." rows="3">@if(!empty($cmsdata['description'])) {{$cmsdata['description']}} @else {{ old('description')}} @endif</textarea>
                                        </div>
                                        <div class="col-md-9">
											<label for="meta_title" class="form-label">Meta Title</label>
											<input type="text" name="meta_title" class="form-control" id="meta_title" placeholder="Enter meta_title" @if(!empty($cmsdata['meta_title'])) value="{{$cmsdata['meta_title']}}" @else value="{{ old('meta_title')}}" @endif>
										</div>
                                        <div class="col-9">
										    <label for="meta_description" class="form-label">Meta Description</label>
                                            <textarea class="form-control" name="meta_description" id="editor2" placeholder="description..." rows="3">@if(!empty($cmsdata['meta_description'])) {{$cmsdata['meta_description']}} @else {{ old('meta_description')}} @endif</textarea>
                                        </div>
										<div class="col-md-9">
											<label for="meta_keyword" class="form-label">Meta Keyword</label>
											<input type="text" name="meta_keyword" class="form-control" id="meta_keyword" placeholder="Enter meta_keyword" @if(!empty($cmsdata['meta_keyword'])) value="{{$cmsdata['meta_keyword']}}" @else value="{{ old('meta_keyword')}}" @endif>
										</div>
                                       
										
										<div class="col-12">
											<button class="btn btn-primary" type="submit">{{$name}}</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--end row-->
			</div>
		</div>	
@endsection
@section("script_js")
<script src="https://cdn.ckeditor.com/ckeditor5/34.1.0/classic/ckeditor.js"></script>

<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
		ClassicEditor
        .create( document.querySelector( '#editor2' ) )
        .catch( error => {
            console.error( error );
        } );
</script>

@endsection
