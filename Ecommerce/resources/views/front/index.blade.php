<?php 
use App\Models\Product; ?>
@extends("layouts.front_layouts.front_layout")
@section("content")


<div class="span9">
				<div class="well well-small">
					<h4>Featured Products <small class="pull-right">{{$featuredItemCount}} featured products</small></h4>
					<div class="row-fluid">
						<div id="featured" @if(($featuredItemCount)>4) class="carousel slide" @endif>
							<div class="carousel-inner">
								@foreach($featuredItemChunk as $key=> $featuredItem)
								<div class="item @if($key ==1)active @endif">
									<ul class="thumbnails">
										@foreach($featuredItem as $item)
										<li class="span3">
											<div class="thumbnail">
												<i class="tag"></i>
												<a href="{{url($item['id'])}}">
													<?php $product_image_path = "backEnd/images/products/small/".$item['main_image']; ?>
													@if(!empty($item['main_image']) && file_exists($product_image_path))
													<img src="{{asset($product_image_path)}}" alt="">
													@else
													<img src="{{asset('backEnd/images/products/small/no-image.png')}}" alt="">
													@endif
												</a>
												
												<div class="caption">
												<?php $discounted_price = Product::getDiscountedPrice($item['id']); ?>
													<h5>{{$item['product_name']}}</h5>
													<h4><a class="btn" href="{{url($item['id'])}}">VIEW</a> <span class="pull-right">@if($discounted_price>0) <small>৳.<del>{{ $item['product_price'] }}</del></small> @else ৳.{{ $item['product_price'] }} @endif  @if($discounted_price>0) ৳.{{ $discounted_price}}  @endif</span></h4>
												</div>
											</div>
										</li>
										@endforeach
									</ul>
								</div>
								@endforeach
							</div>
							
						</div>
					</div>
				</div>
				<h4>Latest Products </h4>
				<ul class="thumbnails">
					@foreach($newProduct as $product)
					<li class="span3">
						<div class="thumbnail">
							<a  href="{{url($product['id'])}}"><?php $product_image_path = "backEnd/images/products/small/".$product['main_image']; ?>
								@if(!empty($product['main_image']) && file_exists($product_image_path))
								<img width="150" src="{{asset($product_image_path)}}" alt="">
								@else
								<img width="150" src="{{asset('backEnd/images/products/small/no-image.png')}}" alt="">
								@endif
							</a>
							<div class="caption">
							<?php $discounted_price = Product::getDiscountedPrice($product['id']); ?>
								<h5>{{$product['product_name']}}</h5>
								<p>
									{{$product['product_code']}} | {{$product['product_color']}} @if($discounted_price>0) | <small>৳.<del>{{ $product['product_price'] }}</del></small>@endif
								</p>

								<h4 style="text-align:center"><a class="btn" href="{{url($product['id'])}}"><i class="fas fa-search-plus"></i></a> <a class="btn" href="#">Add to <i class="fas fa-cart-plus"></i></a> <a class="btn btn-primary" href="#">@if($discounted_price>0) ৳.{{ $discounted_price}} @else ৳.{{$product['product_price']}} @endif</a></h4>
							</div>
						</div>
					</li>
					@endforeach
				</ul>
     </div>
@endsection