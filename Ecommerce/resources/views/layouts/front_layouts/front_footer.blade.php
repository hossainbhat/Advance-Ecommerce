<div  id="footerSection">
	<div class="container">
		<div class="row">
			<div class="span3">
				<h5>ACCOUNT</h5>
				<a href="{{url('/account')}}">YOUR ACCOUNT</a>
				<a href="#">PERSONAL INFORMATION</a>
				@if(Auth::check())
				<a href="{{url('orders')}}">ORDER HISTORY</a>
				@endif
			</div>
			<div class="span3">
				<h5>INFORMATION</h5>
				<a href="{{url('contact')}}">CONTACT</a>
				<a href="{{url('about')}}">ABOUT US</a>
				<a href="{{url('terms_and_condition')}}">TERMS AND CONDITIONS</a>
				<a href="{{url('faq')}}">FAQ</a>
			</div>
			<div class="span3">
				<h5>OUR OFFERS</h5>
				<a href="#">NEW PRODUCTS</a>
				<a href="#">TOP SELLERS</a>
				<a href="#">SPECIAL OFFERS</a>
			</div>
			<div id="socialMedia" class="span3 pull-right">
				<h5>SOCIAL MEDIA </h5>
				<a href="#"><img width="60" height="60" src="{{asset('front/images/facebook.png')}}" title="facebook" alt="facebook"/></a>
				<a href="#"><img width="60" height="60" src="{{asset('front/images/twitter.png')}}" title="twitter" alt="twitter"/></a>
				<a href="#"><img width="60" height="60" src="{{asset('front/images/youtube.png')}}" title="youtube" alt="youtube"/></a>
			</div>
		</div>
		<p class="pull-right"><a target="_blank" href="{{url('https://everywearbd.com/')}}">&copy; Everywearbd</a></p>
	</div><!-- Container End -->
</div>