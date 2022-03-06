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
	<h3> Login / Register</h3>	
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
    @endif
		<div class="span4">
			<div class="well">
			<h5>CREATE YOUR ACCOUNT</h5><br/>
			Enter your details to create an account.<br/><br/><br/>
			<form id="RegisterForm" action="{{url('register')}}" method="post">
				@csrf
			  <div class="control-group">
				<label class="control-label" for="name">Full Name</label>
				<div class="controls">
				  <input class="span3" name="name"  type="text" id="name" placeholder="Enter Name">
				</div>
			  </div>
              <div class="control-group">
				<label class="control-label" for="mobile">Mobile</label>
				<div class="controls">
				  <input class="span3" name="mobile"  type="text" id="mobile" placeholder="Enter Mobile">
				</div>
			  </div>
              <div class="control-group">
				<label class="control-label" for="email">E-mail address</label>
				<div class="controls">
				  <input class="span3" name="email" type="text" id="email" placeholder="Enter Email">
				</div>
			  </div>
              <div class="control-group">
				<label class="control-label" for="password">Password</label>
				<div class="controls">
				  <input class="span3" name="password"  type="password" id="password" placeholder="Enter Password">
				</div>
			  </div>
			  <div class="controls">
			  <button type="submit" class="btn block">Create Your Account</button>
			  </div>
			</form>
		</div>
		</div>
		<div class="span1"> &nbsp;</div>
		<div class="span4">
			<div class="well">
			<h5>ALREADY REGISTERED ?</h5>
			<form id="LoginForm" action="{{url('/login')}}" method="post">
				@csrf
			  <div class="control-group">
				<label class="control-label" for="email">Email</label>
				<div class="controls">
				  <input class="span3" name="email" type="text" id="email" placeholder="Email">
				</div>
			  </div>
			  <div class="control-group">
				<label class="control-label" for="password">Password</label>
				<div class="controls">
				  <input type="password" name="password" class="span3"  id="password" placeholder="Password">
				</div>
			  </div>
			  <div class="control-group">
				<div class="controls">
				  <button type="submit" class="btn">Sign in</button> <a href="{{url('forgot-password')}}">Forget password?</a>
				</div>
			  </div>
			</form>
		</div>
		</div>
	</div>	
	
</div>
@endsection