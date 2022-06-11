@extends("layouts.front_layouts.front_layout")
@section('title','Product Listing')
@section("content")
		<!-- Sidebar end=============================================== -->
		<div class="span9">
			<ul class="breadcrumb">
				<li><a href="{{url('/')}}">Home</a> <span class="divider">/</span></li>
				<li class="active"><?php echo $categoryDetails['breadcrumbs']; ?></li>
			</ul>
			<h3> {{$categoryDetails['categoryDetails']['name']}} <small class="pull-right">{{ count($categoryProduct) }} products are available </small></h3>
			<hr class="soft"/>
			<p>
			 {{$categoryDetails['categoryDetails']['description']}}
			</p>
			<hr class="soft"/>
			@if(!isset($_REQUEST['search']))
			<form class="form-horizontal span6" name="sortProducts" id="sortProducts">
				<input type="hidden" name="url" id="url" value="{{ $url }}">
				<div class="control-group">
					<label class="control-label alignL">Sort By </label>
					<select name="sort" id="sort">
						<option value="">Select</option>
						<option value="product_latest" @if(isset($_GET['sort']) && $_GET['sort'] == 'product_latest') selected="" @endif>Latest Products</option>
						<option value="product_name_a_z" @if(isset($_GET['sort']) && $_GET['sort'] == 'product_name_a_z') selected="" @endif>Product name A - Z</option>
						<option value="product_name_z_a" @if(isset($_GET['sort']) && $_GET['sort'] == 'product_name_z_a') selected="" @endif>Product name Z - A</option>
						<option value="price_lowest" @if(isset($_GET['sort']) && $_GET['sort'] == 'price_lowest') selected="" @endif> Lowest Price first</option>
						<option value="price_height" @if(isset($_GET['sort']) && $_GET['sort'] == 'price_height') selected="" @endif>Height Price first</option>
					</select>
				</div>
			</form>
			@endif 
			<div id="myTab" class="pull-right">
				<a href="#blockView" data-toggle="tab"></a>
			</div>
			<br class="clr"/>
			<div class="tab-content filter_products">

				@include('front.products.ajax_products_listing')

			</div>
			<a href="compair.html" class="btn btn-large pull-right">Compare Product</a>
			@if(!isset($_REQUEST['search']))
			<div class="pagination">
				@if(isset($_GET['sort']) && !empty($_GET['sort']))
					{{ $categoryProduct->appends(['sort' => 'price_lowest'])->links() }}
				@else
				 	{{ $categoryProduct->links()}}
				@endif
			</div>
			@endif 
			<br class="clr"/>
		</div>
@endsection
