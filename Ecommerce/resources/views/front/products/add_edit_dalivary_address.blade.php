@extends("layouts.front_layouts.front_layout")
@section('title',$title)
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
		<li class="active">Dalivary Address</li>
    </ul>
	<h3> {{$title}}</h3>	
	<hr class="soft"/>
	
	<div class="row">
	@if(Session::has('success_message'))
     <div class="alert alert-success" role="alert">
       {{Session::get('success_message')}}
       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
         <span aria-hidden="true">&times;</span>
       </button>
     </div>
     <?php Session::forget('success_message') ?>
     @endif
	@if(Session::has('error_message'))
    <div class="alert alert-danger" role="alert">
      {{Session::get('error_message')}}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <?php Session::forget('error_message') ?>
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
    
		<div class="span4">
			<div class="well">
			Dalivary Address details.<br/><br/><br/>
			<form id="dalivaryAddressForm" @if(empty($address->id)) action="{{url('add-edit-dalivary-address')}}" @else action="{{url('add-edit-dalivary-address/'.$address->id)}}" @endif method="post">
				@csrf
			  <div class="control-group">
				<label class="control-label" for="name"> Name</label>
				<div class="controls">
				  <input class="span3" name="name"  type="text" id="name"  placeholder="Enter Name" @if(isset($address->name)) value="{{$address->name}}" @else value="{{old('name')}}" @endif >
				</div>
			  </div>
              <div class="control-group">
				<label class="control-label" for="address"> Address</label>
				<div class="controls">
				  <input class="span3" name="address"  type="text" id="address"  placeholder="Enter address"  @if(isset($address->address)) value="{{$address->address}}" @else value="{{old('address')}}" @endif>
				</div>
			  </div>
              <div class="control-group">
				<label class="control-label" for="city"> City</label>
				<div class="controls">
				  <input class="span3" name="city"  type="text" id="city"  placeholder="Enter city" @if(isset($address->city)) value="{{$address->city}}" @else value="{{old('city')}}" @endif>
				</div>
			  </div>
              <div class="control-group">
				<label class="control-label" for="state"> State</label>
				<div class="controls">
				  <input class="span3" name="state"  type="text" id="state"  placeholder="Enter state"  @if(isset($address->state))  value="{{$address->state}}" @else value="{{old('state')}}" @endif>
				</div>
			  </div>
              <div class="control-group">
				<label class="control-label" for="country"> Country</label>
				<div class="controls">
					<select class="span3" name="country" id="country">
						<option value="">select country</option>
						@foreach($countries as $country)
						<option value="{{$country->country_name}}" @if($country->country_name == $address['country']) selected="" @elseif($country->country_name == old('country')) selected="" @endif>{{$country->country_name}}</option>
						@endforeach
					</select>
				</div>
			  </div>
              <div class="control-group">
				<label class="control-label" for="pincode"> Pincode</label>
				<div class="controls">
				  <input class="span3" name="pincode"  type="text" id="pincode"  placeholder="Enter pincode" @if(isset($address->pincode)) value="{{$address->pincode}}"  @else value="{{old('pincode')}}" @endif>
				</div>
			  </div>
              <div class="control-group">
				<label class="control-label" for="mobile">Mobile</label>
				<div class="controls">
				  <input class="span3" name="mobile"  type="text" id="mobile"  placeholder="Enter Mobile"   @if(isset($address->mobile)) value="{{$address->mobile}}"  @else value="{{old('mobile')}}" @endif>
				</div>
			  </div>
			  <div class="controls">
			    <button type="submit" class="btn block">submit</button>
			    <a style="float:right;" href="{{url('checkout')}}" class="btn block">Back</a>
			  </div>
			</form>
		</div>
		</div>
		
	
		</div>
	</div>	
	
</div>
@endsection