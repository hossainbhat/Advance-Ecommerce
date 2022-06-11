<?php
	use App\Models\Section;
	$sections = Section::sections();
	// echo "<pre>"; print_r($sections); die;
 ?>

<div id="header">
	<div class="container">
		<div id="welcomeLine" class="row">
			<div class="span6">Welcome! @if(Auth::check())<strong> {{Auth::user()->name}}</strong>@endif</div>
			<div class="span6">
				<div class="pull-right">
					<a href="{{url('cart')}}"><span class="btn btn-mini btn-primary"><i class="icon-shopping-cart icon-white"></i> [ <span class="totalCartItems">{{ totalCartItems() }}</span>  ] Items in your cart </span> </a>
					@if(Auth::check())
					<a href="{{url('wishlist-item')}}"><span class="btn btn-mini btn-primary"><i class="icon-heart-empty icon-white"></i> [ <span class="totalWishlisttems">{{ totalWishlisttems() }}</span>  ] Wishlist </span> </a>
					@endif 
				</div>
			</div>
		</div>
		<!-- Navbar ================================================== -->
		<section id="navbar">
		  <div class="navbar">
		    <div class="navbar-inner">
		      <div class="container">
		        <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
		          <span class="icon-bar"></span>
		          <span class="icon-bar"></span>
		          <span class="icon-bar"></span>
		        </a>
		        <a class="brand" href="{{url('/')}}">Everywearbd</a>
		        <div class="nav-collapse">
		          <ul class="nav">
		            <li class="active"><a href="#">Home</a></li>
		            @foreach($sections as $section)
		            	@if(count($section['categories']) > 0)
			            <li class="dropdown">
			              <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ $section->name }} <b class="caret"></b></a>
			              <ul class="dropdown-menu">
			              	@foreach($section['categories'] as $category)
			              	<li class="divider"></li>
			                <li class="nav-header"><a href="{{ $category['url'] }}">{{ $category->name }}</a></li>
			                   @foreach($category['subcategories'] as $subcategorie)
			                     <li><a href="{{ $subcategorie['url'] }}">{{$subcategorie->name}}</a></li>
			                   @endforeach
			                @endforeach
			              </ul>
			            </li>
			            @endif
		            @endforeach
		           
					
		          </ul>
		          <form class="navbar-search pull-left" action="{{url('search-products')}}" method="get">
		            <input type="text" name="search" class="search-query span2" placeholder="Search"/>
					<button type="submit">Go</button>
		          </form>
		          <ul class="nav pull-right">
				  <li><a href="{{url('contact')}}">Contact</a></li>
				  <li class="divider-vertical"></li>
					@if(Auth::check())
						<li><a href="{{url('/account')}}">My Account</a></li>
						<li><a href="{{url('logout')}}">Logout</a></li>
					@else
		            <li><a href="{{url('login-register')}}">Login / Registation</a></li>
					@endif
		          </ul>
		        </div><!-- /.nav-collapse -->
		      </div>
		    </div><!-- /navbar-inner -->
		  </div><!-- /navbar -->
		</section>
	</div>
</div>
