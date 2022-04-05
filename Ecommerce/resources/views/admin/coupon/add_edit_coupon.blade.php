@extends("layouts.admin_layouts.admin_layout")
@section('title',$name)
@section('script_css')
<link href="{{asset('backEnd/plugins/select2/css/select2.min.css')}}" rel="stylesheet" />
<link href="{{asset('backEnd/plugins/select2/css/select2-bootstrap4.css')}}" rel="stylesheet" />
@endsection
@section('content')
<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				
				<!--end breadcrumb-->
				<div class="row">
					<div class="col-xl-9 mx-auto">
						<h6 class="mb-0 text-uppercase">{{$name}}</h6>                        
						<a href="{{url('admin/coupons')}}" style="float:right; margin-top:-30px;"><button class="btn btn-sm btn-success">Coupon List <i class="lni lni-list"></i></button></a>

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
									<form class="row g-3 needs-validation" @if(empty($coupondata['id'])) action="{{url('admin/add-edit-coupon')}}" @else   action="{{url('admin/add-edit-coupon/'.$coupondata['id'] )}}" @endif method="post">
                                    @csrf
                                    
                                        @if(empty($coupon['coupon_code']))
										<div class="col-md-9">
											<label class="form-label"><strong>Coupon Option</strong></label><br>
                                            <input type="radio"  id="automatic" name="coupon_option" value="Automatic" checked> Automatic &nbsp;
                                            <input type="radio" id="manual" name="coupon_option" value="Manual"> Manual
										</div>
                                        <div class="col-md-9" style="display: none" id="couponCode">
											<label for="coupon_code" class="form-label"><strong>Coupon Code</strong></label>
											<input type="text" name="coupon_code" class="form-control" id="coupon_code" placeholder="Enter coupon code" >
										</div>
                                        @else 
                                        <div class="col-md-9">
											<input type="hidden" name="coupon_option" value="{{$coupon['coupon_option']}}">
											<input type="hidden" name="coupon_code" value="{{$coupon['coupon_code']}}">
											<label for="coupon_code" class="form-label"><strong>Coupon Code :</strong></label> 
											{{$coupon['coupon_code']}}
										</div>

                                        @endif 
                                        <div class="col-md-9">
											<label class="form-label"><strong>Coupon Type</strong></label><br>
                                            <input type="radio" name="coupon_type" value="Multiple Time" @if(@isset($coupon['coupon_type']) && $coupon['coupon_type'] == "Multiple Time") checked @elseif(!isset($coupon['coupon_type'])) checked @endif> Multiple Time &nbsp;
                                            <input type="radio" name="coupon_type" value="Single Time" @if(@isset($coupon['coupon_type']) && $coupon['coupon_type'] == "Single Time") checked  @endif> Single Time
										</div>
                                        <div class="col-md-9">
											<label class="form-label"><strong>Amount Type</strong></label><br>
                                            <input type="radio" name="amount_type" value="Percentage" @if(@isset($coupon['amount_type']) && $coupon['amount_type'] == "Percentage") checked @elseif(!isset($coupon['amount_type'])) checked @endif> Percentage(%) &nbsp;
                                            <input type="radio" name="amount_type" value="Fixt"  @if(@isset($coupon['amount_type']) && $coupon['amount_type'] == "Fixt") checked @endif> Fixt($)
										</div>
                                        <div class="col-md-9">
                                            <label class="form-label">Amount</label>
                                            <input type="number" name="amount" class="form-control" placeholder="Enter amount" @if(isset($coupon['amount'])) value="{{$coupon['amount']}}" @endif>
                                        </div>
                                        <div class="col-md-9">
											<label for="categories" class="form-label"><strong>Select Category</strong></label>
                                            <select name="categories[]" id="categories"  class="users-select select2-hidden-accessible" data-select2-id="1" tabindex="-1" aria-hidden="true" multiple>
                                                <option value="" disabled>Select actegory</option>
												@foreach($categories as $section)
													<optgroup label="{{ $section['name'] }}"></optgroup>	 
													@foreach($section['categories'] as $category)
														<option value="{{$category['id']}}"  @if(in_array($category['id'],$selectCats)) selected @endif >&nbsp;&nbsp;--&nbsp;{{ $category['name'] }}</option>
														@foreach($category['subcategories'] as $subcategory)
															<option value="{{$subcategory['id']}}" @if(in_array($subcategory['id'],$selectCats)) selected @endif>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;{{ $subcategory['name'] }}</option>
														@endforeach
													@endforeach
												@endforeach
                                                </select>									
                                            
                                        </div>
                                        <div class="col-md-9">
											<label for="users" class="form-label"><strong>Select Users</strong></label>
                                            <select name="users[]" id="users" class="user-select select2-hidden-accessible" data-select2-id="2" tabindex="-2" aria-hidden="true" multiple>
                                                    <option value="" disabled>Select user email</option>
                                                    @foreach($users as $user)
                                                        <option value="{{$user['email']}}" @if(in_array($user['email'],$selectUsers)) selected @endif>{{$user['email'] }}</option>
                                                    @endforeach
                                            </select>										
                                            
                                        </div>
                                        <div class="col-md-9">
                                            <label class="form-label">Expity Date:</label>
                                            <input type="date" name="expiry_date" class="form-control" @if(isset($coupon['expiry_date'])) value="{{$coupon['expiry_date']}}" @endif>
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
<script src="{{asset('backEnd/plugins/select2/js/select2.min.js')}}"></script>
	<script>

        $('.users-select').select2({
			theme: 'bootstrap4',
			width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
			placeholder: $(this).data('placeholder'),
			allowClear: Boolean($(this).data('allow-clear')),
		});
         $('.user-select').select2({
			theme: 'bootstrap4',
			width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
			placeholder: $(this).data('placeholder'),
			allowClear: Boolean($(this).data('allow-clear')),
		});
	</script>
<script>
    
			
            $("#manual").click(function(){
                $("#couponCode").show();
            });
            $("#automatic").click(function(){
                $("#couponCode").hide();
            });
    
       
</script>
@endsection
