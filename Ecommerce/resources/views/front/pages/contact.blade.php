
@extends("layouts.front_layouts.front_layout")
@section("content")
<div id="mainBody">
<div class="container">
	<hr class="soften">	
	<div class="row">
		<div class="span4">
		<h4>Contact Details</h4>
		<p>	18 Fresno,<br/> CA 93727, USA
			<br/><br/>
			info@sitemakers.in<br/>
			﻿Tel 00000-00000<br/>
			Fax 00000-00000<br/>
			web: https://www.youtube.com/StackDevelopers
		</p>		
		</div>
			
		
		<div class="span4">
		<h4>Email Us</h4>
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
			<div class="alert alert-danger border-0 bg-success alert-dismissible fade show">
				<div class="text-white">{{Session::get('error_message')}}</div>
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
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
		<form class="form-horizontal" action="{{url('contact')}}" method="post">
            @csrf
        <fieldset>
          <div class="control-group">
           
              <input type="text" placeholder="name" name="name" id="name" class="input-xlarge"/>
           
          </div>
		   <div class="control-group">
           
              <input type="text" placeholder="email" name="email" id="email" class="input-xlarge"/>
           
          </div>
		   <div class="control-group">
           
              <input type="text" placeholder="subject" name="subject" id="subject" class="input-xlarge"/>
          
          </div>
          <div class="control-group">
              <textarea rows="3" id="textarea" name="message" id="message" class="input-xlarge"></textarea>
           
          </div>

            <button class="btn btn-large" type="submit">Send Messages</button>

        </fieldset>
      </form>
		</div>
	</div>
	<div class="row">
	<div class="span12">
	<iframe style="width:100%; height:300; border: 0px" scrolling="no" src="https://maps.google.co.uk/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=18+California,+Fresno,+CA,+United+States&amp;aq=0&amp;oq=18+California+united+state&amp;sll=39.9589,-120.955336&amp;sspn=0.007114,0.016512&amp;ie=UTF8&amp;hq=&amp;hnear=18,+Fresno,+California+93727,+United+States&amp;t=m&amp;ll=36.732762,-119.695787&amp;spn=0.017197,0.100336&amp;z=14&amp;output=embed"></iframe><br />
	<small><a href="https://maps.google.co.uk/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=18+California,+Fresno,+CA,+United+States&amp;aq=0&amp;oq=18+California+united+state&amp;sll=39.9589,-120.955336&amp;sspn=0.007114,0.016512&amp;ie=UTF8&amp;hq=&amp;hnear=18,+Fresno,+California+93727,+United+States&amp;t=m&amp;ll=36.732762,-119.695787&amp;spn=0.017197,0.100336&amp;z=14" style="color:#0000FF;text-align:left">View Larger Map</a></small>
	</div>
	</div>
</div>
</div>
@endsection
