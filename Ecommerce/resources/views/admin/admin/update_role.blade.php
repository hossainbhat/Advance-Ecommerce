@extends("layouts.admin_layouts.admin_layout")
@section('title','Role and Permission')
@section('content')
<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				
				<!--end breadcrumb-->
				<div class="row">
					<div class="col-xl-9 mx-auto">
						<h6 class="mb-0 text-uppercase">{{$title}}</h6>                        
						<a href="{{url('admin/admins')}}" style="float:right; margin-top:-30px;"><button class="btn btn-sm btn-success">Admin / Subadmin List <i class="lni lni-list"></i></button></a>

						<hr>
						<div class="card">
							<div class="card-body">
								<div class="p-4 border rounded">
										@if(Session::has('success_message'))
											<div class="alert alert-success border-0 bg-success alert-dismissible fade show">
												<div class="text-white">{{Session::get('success_message')}}</div>
												<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
											</div>
										@endif
									<form class="row g-3 needs-validation"  action="{{url('admin/update-role/'.$adminDetails['id'] )}}"  method="post">
                                    @csrf



                                        @if(!empty($adminRoles))
                                            @foreach($adminRoles as $role)

                                            @if($role['module'] == "section")
                                                    @if($role['view_access'] == 1)
                                                        @php $viewSection = "checked"; @endphp
                                                    @else 
                                                        @php $viewSection = ""; @endphp
                                                    @endif 
                                                    @if($role['edit_access'] == 1)
                                                        @php $editSection = "checked"; @endphp
                                                    @else 
                                                        @php $editSection = ""; @endphp
                                                    @endif 
                                                    @if($role['full_access'] == 1)
                                                        @php $fullSection = "checked"; @endphp
                                                    @else 
                                                        @php $fullSection = ""; @endphp
                                                    @endif 
                                                @endif 

                                                @if($role['module'] == "brand")
                                                    @if($role['view_access'] == 1)
                                                        @php $viewBrand = "checked"; @endphp
                                                    @else 
                                                        @php $viewBrand = ""; @endphp
                                                    @endif 
                                                    @if($role['edit_access'] == 1)
                                                        @php $editBrand = "checked"; @endphp
                                                    @else 
                                                        @php $editBrand = ""; @endphp
                                                    @endif 
                                                    @if($role['full_access'] == 1)
                                                        @php $fullBrand = "checked"; @endphp
                                                    @else 
                                                        @php $fullBrand = ""; @endphp
                                                    @endif 
                                                @endif 


                                                @if($role['module'] == "category")
                                                    @if($role['view_access'] == 1)
                                                        @php $viewCategory = "checked"; @endphp
                                                    @else 
                                                        @php $viewCategory = ""; @endphp
                                                    @endif 
                                                    @if($role['edit_access'] == 1)
                                                        @php $editCategory = "checked"; @endphp
                                                    @else 
                                                        @php $editCategory = ""; @endphp
                                                    @endif 
                                                    @if($role['full_access'] == 1)
                                                        @php $fullCategory = "checked"; @endphp
                                                    @else 
                                                        @php $fullCategory = ""; @endphp
                                                    @endif 
                                                @endif 

                                                @if($role['module'] == "product")
                                                    @if($role['view_access'] == 1)
                                                        @php $viewProduct = "checked"; @endphp
                                                    @else 
                                                        @php $viewProduct = ""; @endphp
                                                    @endif 
                                                    @if($role['edit_access'] == 1)
                                                        @php $editProduct = "checked"; @endphp
                                                    @else 
                                                        @php $editProduct = ""; @endphp
                                                    @endif 
                                                    @if($role['full_access'] == 1)
                                                        @php $fullProduct = "checked"; @endphp
                                                    @else 
                                                        @php $fullProduct = ""; @endphp
                                                    @endif 
                                                @endif 


                                                @if($role['module'] == "banner")
                                                    @if($role['view_access'] == 1)
                                                        @php $viewBanner = "checked"; @endphp
                                                    @else 
                                                        @php $viewBanner = ""; @endphp
                                                    @endif 
                                                    @if($role['edit_access'] == 1)
                                                        @php $editBanner = "checked"; @endphp
                                                    @else 
                                                        @php $editBanner = ""; @endphp
                                                    @endif 
                                                    @if($role['full_access'] == 1)
                                                        @php $fullBanner = "checked"; @endphp
                                                    @else 
                                                        @php $fullBanner = ""; @endphp
                                                    @endif 
                                                @endif 



                                                @if($role['module'] == "coupon")
                                                    @if($role['view_access'] == 1)
                                                        @php $viewCoupon = "checked"; @endphp
                                                    @else 
                                                        @php $viewCoupon = ""; @endphp
                                                    @endif 
                                                    @if($role['edit_access'] == 1)
                                                        @php $editCoupon = "checked"; @endphp
                                                    @else 
                                                        @php $editCoupon = ""; @endphp
                                                    @endif 
                                                    @if($role['full_access'] == 1)
                                                        @php $fullCoupon = "checked"; @endphp
                                                    @else 
                                                        @php $fullCoupon = ""; @endphp
                                                    @endif 
                                                @endif 

                                                @if($role['module'] == "rating")
                                                    @if($role['view_access'] == 1)
                                                        @php $viewRating = "checked"; @endphp
                                                    @else 
                                                        @php $viewRating = ""; @endphp
                                                    @endif 
                                                    @if($role['edit_access'] == 1)
                                                        @php $editRating = "checked"; @endphp
                                                    @else 
                                                        @php $editRating = ""; @endphp
                                                    @endif 
                                                    @if($role['full_access'] == 1)
                                                        @php $fullRating = "checked"; @endphp
                                                    @else 
                                                        @php $fullRating = ""; @endphp
                                                    @endif 
                                                @endif 


                                                @if($role['module'] == "cms")
                                                    @if($role['view_access'] == 1)
                                                        @php $viewCms = "checked"; @endphp
                                                    @else 
                                                        @php $viewCms = ""; @endphp
                                                    @endif 
                                                    @if($role['edit_access'] == 1)
                                                        @php $editCms = "checked"; @endphp
                                                    @else 
                                                        @php $editCms = ""; @endphp
                                                    @endif 
                                                    @if($role['full_access'] == 1)
                                                        @php $fullCms = "checked"; @endphp
                                                    @else 
                                                        @php $fullCms = ""; @endphp
                                                    @endif 
                                                @endif 

                                                @if($role['module'] == "shiping")
                                                    @if($role['view_access'] == 1)
                                                        @php $viewShiping = "checked"; @endphp
                                                    @else 
                                                        @php $viewShiping = ""; @endphp
                                                    @endif 
                                                    @if($role['full_access'] == 1)
                                                        @php $fullShiping = "checked"; @endphp
                                                    @else 
                                                        @php $fullShiping = ""; @endphp
                                                    @endif 
                                                @endif 


                                                @if($role['module'] == "order")
                                                    @if($role['view_access'] == 1)
                                                        @php $viewOrder = "checked"; @endphp
                                                    @else 
                                                        @php $viewOrder = ""; @endphp
                                                    @endif 
                                                    @if($role['full_access'] == 1)
                                                        @php $fullOrder = "checked"; @endphp
                                                    @else 
                                                        @php $fullOrder = ""; @endphp
                                                    @endif 
                                                @endif 


                                                @if($role['module'] == "user")
                                                    @if($role['view_access'] == 1)
                                                        @php $viewUser = "checked"; @endphp
                                                    @else 
                                                        @php $viewUser = ""; @endphp
                                                    @endif 
                                                    @if($role['full_access'] == 1)
                                                        @php $fullUser = "checked"; @endphp
                                                    @else 
                                                        @php $fullUser = ""; @endphp
                                                    @endif 
                                                @endif 

                                                @if($role['module'] == "role")
                                                    @if($role['view_access'] == 1)
                                                        @php $viewRole = "checked"; @endphp
                                                    @else 
                                                        @php $viewRole = ""; @endphp
                                                    @endif 
                                                    @if($role['edit_access'] == 1)
                                                        @php $editRole = "checked"; @endphp
                                                    @else 
                                                        @php $editRole = ""; @endphp
                                                    @endif 
                                                    @if($role['full_access'] == 1)
                                                        @php $fullRole = "checked"; @endphp
                                                    @else 
                                                        @php $fullRole = ""; @endphp
                                                    @endif 
                                                @endif 

                                            @endforeach
                                        @endif

										<div class="col-md-9">
											<div class="col-md-3">
                                            <label for="section" class="form-label"><strong>Section</strong></label>
                                            </div>
                                           
                                            <div class="col-md-9">
                                                <input type="checkbox" name="section[view]" id="viewSection" value="1"  @if(isset($viewSection)) {{ $viewSection }} @endif> <label for="viewSection">View Access</label> &nbsp; &nbsp;
                                                <input type="checkbox" name="section[edit]" id="editSection" value="1"  @if(isset($editSection)) {{ $editSection }} @endif> <label for="editSection">Edit Access</label> &nbsp; &nbsp;
                                                <input type="checkbox" name="section[full]" id="fullSection" value="1"  @if(isset($fullSection)) {{ $fullSection }} @endif> <label for="fullSection">Full Access</label> &nbsp; &nbsp;
                                            </div>
                                        </div>
                                        <div class="col-md-9">
											<div class="col-md-3">
                                            <label for="brand" class="form-label"><strong>Brand</strong></label>
                                            </div>
                                           
                                            <div class="col-md-9">
                                                <input type="checkbox" name="brand[view]" value="1" id="viewBrand" @if(isset($viewBrand)) {{ $viewBrand }} @endif> <label for="viewBrand">View Access</label> &nbsp; &nbsp;
                                                <input type="checkbox" name="brand[edit]" value="1" id="editBrand" @if(isset($editBrand)) {{ $editBrand }} @endif> <label for="editBrand">Edit Access</label> &nbsp; &nbsp;
                                                <input type="checkbox" name="brand[full]" value="1" id="fullBrand" @if(isset($fullBrand)) {{ $fullBrand }} @endif> <label for="fullBrand">Full Access</label> &nbsp; &nbsp;
                                            </div>
                                        </div>
                                        <div class="col-md-9">
											<div class="col-md-3">
                                            <label for="category" class="form-label"><strong>Categoty</strong></label>
                                            </div>
                                           
                                            <div class="col-md-9">
                                                <input type="checkbox" name="category[view]" value="1" id="viewCategory" @if(isset($viewCategory)) {{ $viewCategory }} @endif> <label for="viewCategory">View Access</label> &nbsp; &nbsp;
                                                <input type="checkbox" name="category[edit]" value="1" id="editCategory" @if(isset($editCategory)) {{ $editCategory }} @endif> <label for="editCategory"> Edit Access</label> &nbsp; &nbsp;
                                                <input type="checkbox" name="category[full]" value="1" id="fullCategory" @if(isset($fullCategory)) {{ $fullCategory }} @endif> <label for="fullCategory">Full Access</label> &nbsp; &nbsp;
                                            </div>
                                        </div>
                                        <div class="col-md-9">
											<div class="col-md-3">
                                            <label for="product" class="form-label"><strong>Product</strong></label>
                                            </div>
                                           
                                            <div class="col-md-9">
                                                <input type="checkbox" name="product[view]" value="1" id="viewProduct"  @if(isset($viewProduct)) {{ $viewProduct}} @endif> <label for="viewProduct">View Access</label>&nbsp; &nbsp;
                                                <input type="checkbox" name="product[edit]" value="1" id="editProduct"  @if(isset($editProduct)) {{ $editProduct}} @endif> <label for="editProduct">Edit Access</label>&nbsp; &nbsp;
                                                <input type="checkbox" name="product[full]" value="1" id="fullProduct"  @if(isset($fullProduct)) {{ $fullProduct}} @endif> <label for="fullProduct">Full Access</label>&nbsp; &nbsp;
                                            </div>
                                        </div>
                                        <div class="col-md-9">
											<div class="col-md-3">
                                            <label for="banner" class="form-label"><strong>Banner</strong></label>
                                            </div>
                                           
                                            <div class="col-md-9">
                                                <input type="checkbox" name="banner[view]" value="1" id="viewBanner"  @if(isset($viewBanner)) {{ $viewBanner}} @endif> <label for="viewBanner">View Access</label> &nbsp; &nbsp;
                                                <input type="checkbox" name="banner[edit]" value="1" id="editBanner"  @if(isset($editBanner)) {{ $editBanner}} @endif> <label for="editBanner">Edit Access</label> &nbsp; &nbsp;
                                                <input type="checkbox" name="banner[full]" value="1" id="fullBanner"  @if(isset($fullBanner)) {{ $fullBanner}} @endif> <label for="fullBanner">Full Access</label> &nbsp; &nbsp;
                                            </div>
                                        </div>
                                        <div class="col-md-9">
											<div class="col-md-3">
                                            <label for="coupon" class="form-label"><strong>Coupon</strong></label>
                                            </div>
                                           
                                            <div class="col-md-9">
                                                <input type="checkbox" name="coupon[view]" value="1" id="viewCoupon"  @if(isset($viewCoupon)) {{ $viewCoupon}} @endif> <label for="viewCoupon">View Access</label>  &nbsp; &nbsp;
                                                <input type="checkbox" name="coupon[edit]" value="1" id="editCoupon"  @if(isset($editCoupon)) {{ $editCoupon}} @endif> <label for="editCoupon">Edit Access</label>  &nbsp; &nbsp;
                                                <input type="checkbox" name="coupon[full]" value="1" id="fullCoupon"  @if(isset($fullCoupon)) {{ $fullCoupon}} @endif> <label for="fullCoupon">Full Access </label> &nbsp; &nbsp;
                                            </div>
                                        </div>
                                        

                                        <div class="col-md-9">
											<div class="col-md-3">
                                            <label for="rating" class="form-label"><strong>Rating</strong></label>
                                            </div>
                                           
                                            <div class="col-md-9">
                                                <input type="checkbox" name="rating[view]" value="1" id="viewRating"  @if(isset($viewRating)) {{ $viewRating}} @endif> <label for="viewRating">View Access</label>  &nbsp; &nbsp;
                                                <input type="checkbox" name="rating[full]" value="1" id="fullRating"  @if(isset($fullRating)) {{ $fullRating}} @endif> <label for="fullRating">Full Access</label>  &nbsp; &nbsp;
                                            </div>
                                        </div>
                                       
                                        <div class="col-md-9">
											<div class="col-md-3">
                                            <label for="cms" class="form-label"><strong>Cms Page</strong></label>
                                            </div>
                                           
                                            <div class="col-md-9">
                                                <input type="checkbox" name="cms[view]" value="1" id="viewCms"  @if(isset($viewCms)) {{ $viewCms}} @endif> <label for="viewCms">View Access </label>&nbsp; &nbsp;
                                                <input type="checkbox" name="cms[edit]" value="1" id="editCms"  @if(isset($editCms)) {{ $editCms}} @endif> <label for="editCms">Edit Access </label>&nbsp; &nbsp;
                                                <input type="checkbox" name="cms[full]" value="1" id="fullCms"  @if(isset($fullCms)) {{ $fullCms}} @endif> <label for="fullCms">Full Access</label>  &nbsp; &nbsp;
                                            </div>
                                        </div>


                                        <div class="col-md-9">
											<div class="col-md-3">
                                            <label for="shiping" class="form-label"><strong>Shiping Charge</strong></label>
                                            </div>
                                           
                                            <div class="col-md-9">
                                                <input type="checkbox" name="shiping[view]" value="1" id="viewShiping"  @if(isset($viewShiping)) {{ $viewShiping}} @endif> <label for="viewShiping">View Access </label> &nbsp; &nbsp;
                                                <input type="checkbox" name="shiping[full]" value="1" id="fullShiping"  @if(isset($fullShiping)) {{ $fullShiping}} @endif> <label for="fullShiping">Full Access </label> &nbsp; &nbsp;
                                            </div>
                                        </div>

                                        <div class="col-md-9">
											<div class="col-md-3">
                                            <label for="order" class="form-label"><strong>Order</strong></label>
                                            </div>
                                           
                                            <div class="col-md-9">
                                                <input type="checkbox" name="order[view]" value="1" id="viewOrder"  @if(isset($viewOrder)) {{ $viewOrder}} @endif> <label for="viewOrder">View Access</label>  &nbsp; &nbsp;
                                                <input type="checkbox" name="order[full]" value="1" id="fullOrder"  @if(isset($fullOrder)) {{ $fullOrder}} @endif> <label for="fullOrder"> Full Access</label> &nbsp; &nbsp;
                                            </div>
                                        </div>

                                        <div class="col-md-9">
											<div class="col-md-3">
                                            <label for="user" class="form-label"><strong>User</strong></label>
                                            </div>
                                           
                                            <div class="col-md-9">
                                                <input type="checkbox" name="user[view]" value="1" id="viewUser"  @if(isset($viewUser)) {{ $viewUser}} @endif> <label for="viewUser">View Access</label>  &nbsp; &nbsp;
                                                <input type="checkbox" name="user[full]" value="1" id="fullUser"  @if(isset($fullUser)) {{ $fullUser}} @endif> <label for="fullUser">Full Access</label>  &nbsp; &nbsp;
                                            </div>
                                        </div>


                                        <div class="col-md-9">
											<div class="col-md-3">
                                            <label for="role" class="form-label"><strong>Role / Prmission</strong></label>
                                            </div>
                                           
                                            <div class="col-md-9">
                                                <input type="checkbox" name="role[view]" value="1" id="viewRole"  @if(isset($viewRole)) {{ $viewRole}} @endif> <label for="viewRole">View Access</label>  &nbsp; &nbsp;
                                                <input type="checkbox" name="role[edit]" value="1" id="editRole"  @if(isset($editRole)) {{ $editRole}} @endif> <label for="editRole">Edit Access</label>  &nbsp; &nbsp;
                                                <input type="checkbox" name="role[full]" value="1" id="fullRole"  @if(isset($fullRole)) {{ $fullRole}} @endif> <label for="fullRole">Full Access</label>  &nbsp; &nbsp;
                                            </div>
                                        </div>


										<div class="col-12">
											<button class="btn btn-primary" type="submit">Sumit</button>
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
