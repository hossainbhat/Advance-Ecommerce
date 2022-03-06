@extends("layouts.front_layouts.front_layout")
@section('front_css')
<style>
form.cmxform label.error, label.error {
    color: red;
    font-style: italic;
}
</style>
@endsection
@section("content")
<div class="span9">
    <ul class="breadcrumb">
		<li><a href="index.html">Home</a> <span class="divider">/</span></li>
		<li class="active">Login</li>
    </ul>
	<h3> My Account</h3>	
	<hr class="soft"/>
	
	<div class="row">
	@if(Session::has('success_message'))
     <div class="alert alert-success" role="alert">
       {{Session::get('success_message')}}
       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
         <span aria-hidden="true">&times;</span>
       </button>
     </div>
     @endif
	@if(Session::has('error_message'))
    <div class="alert alert-danger" role="alert">
      {{Session::get('error_message')}}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
	@if ($errors->any())
	<div class="alert alert-danger">
		<ul>
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
@endif
    @endif
		<div class="span4">
			<div class="well">
			<h5>Contact Details</h5><br/>
			User Account details.<br/><br/><br/>
			<form id="userAccountForm" action="{{url('account')}}" method="post">
				@csrf
			  <div class="control-group">
				<label class="control-label" for="name"> Name</label>
				<div class="controls">
				  <input class="span3" name="name"  type="text" id="name" value="{{$userDetails['name']}}" placeholder="Enter Name" required pattern="[A-Za-z]+">
				</div>
			  </div>
              <div class="control-group">
				<label class="control-label" for="address"> Address</label>
				<div class="controls">
				  <input class="span3" name="address"  type="text" id="address" value="{{@$userDetails['address']}}" placeholder="Enter address">
				</div>
			  </div>
              <div class="control-group">
				<label class="control-label" for="city"> City</label>
				<div class="controls">
				  <input class="span3" name="city"  type="text" id="city" value="{{@$userDetails['city']}}" placeholder="Enter city">
				</div>
			  </div>
              <div class="control-group">
				<label class="control-label" for="state"> State</label>
				<div class="controls">
				  <input class="span3" name="state"  type="text" id="state" value="{{@$userDetails['state']}}" placeholder="Enter state">
				</div>
			  </div>
              <div class="control-group">
				<label class="control-label" for="country"> Country</label>
				<div class="controls">
				  {{-- <input class="span3" name="country"  type="text" value="{{@$userDetails['country']}}" id="country" placeholder="Enter country"> --}}
					<select class="span3" name="country" id="country">
						<option value="">select country</option>
						@foreach($countries as $country)
						<option value="{{$country->country_name}}" @if($country->country_name == $userDetails['country']) selected="" @endif>{{$country->country_name}}</option>
						@endforeach
					</select>
				</div>
			  </div>
              <div class="control-group">
				<label class="control-label" for="pincode"> Pincode</label>
				<div class="controls">
				  <input class="span3" name="pincode"  type="text" id="pincode" value="{{@$userDetails['pincode']}}" placeholder="Enter pincode">
				</div>
			  </div>
              <div class="control-group">
				<label class="control-label" for="mobile">Mobile</label>
				<div class="controls">
				  <input class="span3" name="mobile"  type="text" id="mobile" value="{{@$userDetails['mobile']}}" placeholder="Enter Mobile">
				</div>
			  </div>
              <div class="control-group">
				<label class="control-label" for="email">E-mail</label>
				<div class="controls">
				  <input class="span3" type="text" readonly value="{{@$userDetails['email']}}">
				</div>
			  </div>
             
			  <div class="controls">
			  <button type="submit" class="btn block">Update</button>
			  </div>
			</form>
		</div>
		</div>
		<div class="span1"> &nbsp;</div>
		<div class="span4">
			<div class="well">
			<h5>Update Password</h5>
			<form id="LoginForm" action="{{url('update-user-pwd')}}" method="post">
				@csrf
			 
			  <div class="control-group">
				<label class="control-label" for="current_pwd">Current Password</label>
				<div class="controls">
				  <input type="password" name="current_pwd" class="span3"  id="current_pwd" placeholder="Password">
				  <br><span id="chkPwd"></span>
				</div>
			  </div>
              <div class="control-group">
				<label class="control-label" for="new_pwd">New Password</label>
				<div class="controls">
				  <input type="password" name="new_pwd" class="span3"  id="new_pwd" placeholder="Password">
				</div>
			  </div>
              <div class="control-group">
				<label class="control-label" for="confirm_pwd">Confirmm New Password</label>
				<div class="controls">
				  <input type="password" name="confirm_pwd" class="span3"  id="confirm_pwd" placeholder="Password">
				</div>
			  </div>
			  <div class="control-group">
				<div class="controls">
				  <button type="submit" class="btn">Update</button> 
				</div>
			  </div>
			</form>
		</div>
		</div>
	</div>	
	
</div>
@endsection