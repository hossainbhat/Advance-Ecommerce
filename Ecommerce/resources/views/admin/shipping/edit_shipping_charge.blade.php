@extends("layouts.admin_layouts.admin_layout")
@section('title','Edit Shipping Charge')
@section('content')
<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				
				<!--end breadcrumb-->
				<div class="row">
					<div class="col-xl-9 mx-auto">
						<h6 class="mb-0 text-uppercase">Edit Shipping Charge</h6>                        
						<a href="{{url('admin/shipping-charges')}}" style="float:right; margin-top:-30px;"><button class="btn btn-sm btn-success">Shipping Charge List <i class="lni lni-list"></i></button></a>

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
									<form class="row g-3 needs-validation" action="{{url('admin/edit-shipping-charges/'.$shipping_charge['id'] )}}" method="post">
                                    @csrf
                                    
										<div class="col-md-9">
											<label for="country" class="form-label">Country</label>
											<input type="text" name="country" class="form-control" id="country" readonly value="{{$shipping_charge['country']}}">
										</div>

                                        <div class="col-md-9">
											<label for="0_500g" class="form-label">0 To 500g</label>
											<input type="text" name="0_500g" class="form-control" id="0_500g" value="{{$shipping_charge['0_500g']}}">
										</div>
										<div class="col-md-9">
											<label for="501g_1000g" class="form-label">501g To 1000g</label>
											<input type="text" name="501g_1000g" class="form-control" id="501g_1000g" value="{{$shipping_charge['501g_1000g']}}">
										</div>
										<div class="col-md-9">
											<label for="1001g_2000g" class="form-label">1001g To 2000g</label>
											<input type="text" name="1001g_2000g" class="form-control" id="1001g_2000g" value="{{$shipping_charge['1001g_2000g']}}">
										</div>
										<div class="col-md-9">
											<label for="2001g_3000g" class="form-label">2001g To 3000g</label>
											<input type="text" name="2001g_3000g" class="form-control" id="2001g_3000g" value="{{$shipping_charge['2001g_3000g']}}">
										</div>
										<div class="col-md-9">
											<label for="3001g_4000g" class="form-label">3001g To 4000g</label>
											<input type="text" name="3001g_4000g" class="form-control" id="3001g_4000g" value="{{$shipping_charge['3001g_4000g']}}">
										</div>
										<div class="col-md-9">
											<label for="above_5000g" class="form-label">Above To 5000g</label>
											<input type="text" name="above_5000g" class="form-control" id="above_5000g" value="{{$shipping_charge['above_5000g']}}">
										</div>
                                        
										<div class="col-12">
											<button class="btn btn-primary" type="submit">Update</button>
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
