@extends("layouts.admin_layouts.admin_layout")
@section('title','Dashboard')
@section("content")
<div class="page-wrapper">
	<div class="page-content">
	@if(Session::has('error_message'))
		<div class="alert alert-danger border-0 bg-danger alert-dismissible fade show">
			<div class="text-white">{{Session::get('error_message')}}</div>
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>
	@endif
    <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
                   <div class="col">
					 <div class="card radius-10 border-start border-0 border-3 border-info">
						<div class="card-body">
							<div class="d-flex align-items-center">
								<div>
									<p class="mb-0 text-secondary">Total Orders</p>
									<h4 class="my-1 text-info">{{$total_order}}</h4>
									<!-- <p class="mb-0 font-13">+2.5% from last week</p> -->
								</div>
								<div class="widgets-icons-2 rounded-circle bg-gradient-scooter text-white ms-auto"><i class="bx bxs-cart"></i>
								</div>
							</div>
						</div>
					 </div>
				   </div>
				   
				   
				   <div class="col">
					<div class="card radius-10 border-start border-0 border-3 border-danger">
					   <div class="card-body">
						   <div class="d-flex align-items-center">
							   <div>
								   <p class="mb-0 text-secondary">Complete Orders</p>
								   <h4 class="my-1 text-danger">{{$total_complete_order}}</h4>
							   </div>
							   <div class="widgets-icons-2 rounded-circle bg-gradient-bloody text-white ms-auto"><i class="bx bxs-cart"></i>
							   </div>
						   </div>
					   </div>
					</div>
				  </div>
				  <div class="col">
					<div class="card radius-10 border-start border-0 border-3 border-success">
					   <div class="card-body">
						   <div class="d-flex align-items-center">
							   <div>
								   <p class="mb-0 text-secondary">Total Product</p>
								   <h4 class="my-1 text-success">{{$total_product}}</h4>
							   </div>
							   <div class="widgets-icons-2 rounded-circle bg-gradient-ohhappiness text-white ms-auto"><i class="bx bxs-cart"></i>
							   </div>
						   </div>
					   </div>
					</div>
				  </div>
				  <div class="col">
					<div class="card radius-10 border-start border-0 border-3 border-warning">
					   <div class="card-body">
						   <div class="d-flex align-items-center">
							   <div>
								   <p class="mb-0 text-secondary">Total Customers</p>
								   <h4 class="my-1 text-warning">{{$total_user}}</h4>
								   <!-- <p class="mb-0 font-13">+8.4% from last week</p> -->
							   </div>
							   <div class="widgets-icons-2 rounded-circle bg-gradient-blooker text-white ms-auto"><i class="bx bxs-group"></i>
							   </div>
						   </div>
					   </div>
					</div>
				  </div> 
				</div>
    </div>
</div>
@endsection