<?php 
use App\Models\Product; 
use App\Models\Wishlist; 
?>
@extends("layouts.front_layouts.front_layout")
@section('title','Product Details')
@section('front_css')
<style>
  /* component */

.star-rating {
  border:solid 1px #ccc;
  display:flex;
  flex-direction: row-reverse;
  font-size:1.7em;
  justify-content:space-around;
  padding:0.2em;
  text-align:center;
  width:7em;
}

.star-rating input {
  display:none;
}

.star-rating label {
  color:#ccc;
  cursor:pointer;
  font-size:25px;
}

.star-rating :checked ~ label {
  color:#f90;
}

.star-rating label:hover,
.star-rating label:hover ~ label {
  color:#fc0;
}

/* explanation */

article {
  background-color:#ffe;
  box-shadow:0 0 1em 1px rgba(0,0,0,.25);
  color:#006;
  font-family:cursive;
  font-style:italic;
  margin:4em;
  max-width:30em;
  padding:2em;
}
</style>

@endsection
@section("content")

<div class="span9">
  <ul class="breadcrumb">
    <li><a href="{{url('/')}}">Home</a> <span class="divider">/</span></li>
    <li><a href="{{url('/'.$productDetails['category']['url'])}}">{{$productDetails['category']['name']}}</a> <span class="divider">/</span></li>
    <li class="active">{{$productDetails['product_name']}}</li>
  </ul>
  <div class="row">
    <div id="gallery" class="span3">
      <?php $product_image_path = "backEnd/images/products/large/".$productDetails['main_image']; ?>
			@if(!empty($productDetails['main_image']) && file_exists($product_image_path))
        <a href="{{asset($product_image_path)}}" title="Blue Casual T-Shirt">
          <img src="{{asset($product_image_path)}}" style="width:100%" alt="Blue Casual T-Shirt"/>
      </a>
			@else
				<img src="{{asset('backEnd/images/products/small/no-image.png')}}" alt="">
			@endif
      <div id="differentview" class="moreOptopm carousel slide">
        <div class="carousel-inner">
          <div class="item active">
            @foreach($productDetails['product_image'] as $image)
            <a href="{{asset('backEnd/images/products/large/'.$image['image'])}}"> <img style="width:29%" src="{{asset('backEnd/images/products/large/'.$image['image'])}}" alt=""/></a>
            @endforeach
          </div>
        </div>
        <!--
              <a class="left carousel-control" href="#myCarousel" data-slide="prev">‹</a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">›</a>
        -->
      </div>

      <div class="btn-toolbar">
        <div class="btn-group">
        <div class="sharethis-inline-share-buttons"></div>
        </div>
      </div>
    </div>
    <div class="span6">
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
      <h3>{{$productDetails['product_name']}}</h3>
      <small>- {{$productDetails['brand']['name']}}</small>
      @if($avagStarRating>0)
      <div>
          <?php 
          
            $star =1;
            while($star<=$avagStarRating){ ?>
              <span>&#9733;</span>
          <?php $star ++; } ?> ({{$avagRating}}) 
      </div>
      @endif 
      <hr class="soft"/>
      <small>{{$total_stock}} items in stock</small>
      <form action="{{url('add-to-cart')}}" method="post" class="form-horizontal qtyFrm">
        @csrf
        
        <input type="hidden" name="product_id" value="{{$productDetails['id']}}">
        <div class="control-group">
        <?php $discounted_price = Product::getDiscountedPrice($productDetails['id']); ?>
          <h4 class="getAttrPrice">
          @if($discounted_price>0)
            <del>৳.{{$productDetails['product_price']}}</del> ৳.{{$discounted_price}}
          @else 
           ৳.{{$productDetails['product_price']}}
          @endif
          </h4>
            <select  name="size" id="getPrice" product-id="{{$productDetails['id']}}" class="span2 pull-left" required="">
              <option value="">Select Size</option>
              @foreach($productDetails['attributes'] as $attribute)
              <option value="{{$attribute['size']}}">{{$attribute['size']}}</option>
              @endforeach
            </select>
            <input name="quantity" type="number" min="1" class="span1" placeholder="Qty."/ required> 
            <div>&nbsp;</div>
            <button type="submit" class="btn btn-large btn-primary"> Add to cart <i class=" icon-shopping-cart"></i></button>
            @php $countWishlist = 0 @endphp
            @if(Auth::check())
              @php $countWishlist   = Wishlist::countWishlist($productDetails['id']); @endphp 
            <button type="button" class="btn btn-large btn-primary updateWishlist" data-productid="{{$productDetails['id']}}"> Wish List <i class="@if($countWishlist>0) icon-heart @else icon-heart-empty @endif"></i></button>
            @else
            <button type="button" class="btn btn-large btn-primary userLogin"> Wish List <i class=" icon-heart-empty"></i></button>
            @endif 
          </div>
        </div>
      </form>

      <hr class="soft clr"/>
      <p class="span6">
        {{$productDetails['description']}}
      </p>
      <a class="btn btn-small pull-right" href="#detail">More Details</a>
      <br class="clr"/>
      <a href="#" name="detail"></a>
      <hr class="soft"/>
    </div>

    <div class="span9">
      <ul id="productDetail" class="nav nav-tabs">
        <li class="active"><a href="#home" data-toggle="tab">Product Details</a></li>
        <li><a href="#profile" data-toggle="tab">Related Products</a></li>
        @if(isset($productDetails['product_video']) && !empty($productDetails['product_video']))
        <li><a href="#video" data-toggle="tab">Product Video</a></li>
        @endif 
        <li><a href="#review" data-toggle="tab">Review & Rating</a></li>
      </ul>
      <div id="myTabContent" class="tab-content">
        <div class="tab-pane fade active in" id="home">
          <h4>Product Information</h4>
          <table class="table table-bordered">
            <tbody>
              <tr class="techSpecRow"><th colspan="2">Product Details</th></tr>
              <tr class="techSpecRow"><td class="techSpecTD1">Brand: </td><td class="techSpecTD2">{{$productDetails['brand']['name']}}</td></tr>
              <tr class="techSpecRow"><td class="techSpecTD1">Code:</td><td class="techSpecTD2">{{$productDetails['product_code']}}</td></tr>
              <tr class="techSpecRow"><td class="techSpecTD1">Color:</td><td class="techSpecTD2">{{$productDetails['product_color']}}</td></tr>
              @if(!empty($productDetails['fabric']))
              <tr class="techSpecRow"><td class="techSpecTD1">Fabric:</td><td class="techSpecTD2">{{$productDetails['fabric']}}</td></tr>
              @endif
              @if(!empty($productDetails['pattern']))
              <tr class="techSpecRow"><td class="techSpecTD1">Pattern:</td><td class="techSpecTD2">{{$productDetails['pattern']}}</td></tr>
              @endif
              @if(!empty($productDetails['sleeve']))
              <tr class="techSpecRow"><td class="techSpecTD1">Sleeve:</td><td class="techSpecTD2">{{$productDetails['sleeve']}}</td></tr>
              @endif
              @if(!empty($productDetails['fit']))
              <tr class="techSpecRow"><td class="techSpecTD1">Fit:</td><td class="techSpecTD2">{{$productDetails['fit']}}</td></tr>
              @endif
              @if(!empty($productDetails['occasion']))
              <tr class="techSpecRow"><td class="techSpecTD1">Occasion:</td><td class="techSpecTD2">{{$productDetails['occasion']}}</td></tr>
              @endif
            </tbody>
          </table>

          <h5>Washcare</h5>
          <p>{{$productDetails['wash_care']}}</p>

        </div>
        <div class="tab-pane fade" id="profile">
            <div id="myTab" class="pull-right">
              <a href="#listView" data-toggle="tab"><span class="btn btn-large"><i class="fas fa-th-list"></i></span></a>
              <a href="#blockView" data-toggle="tab"><span class="btn btn-large btn-primary"><i class="fas fa-th-large"></i></span></a>
            </div>
            <br class="clr"/>
            <hr class="soft"/>
            <div class="tab-content">
              <div class="tab-pane" id="listView">
                @foreach($relatedProducts as $product)
                  <div class="row">
                    <div class="span2">
                      <?php $product_image_path = "backEnd/images/products/small/".$product['main_image']; ?>
                      @if(!empty($product['main_image']) && file_exists($product_image_path))
                      <img src="{{asset($product_image_path)}}" alt="">
                      @else
                      <img src="{{asset('backEnd/images/products/small/no-image.png')}}" alt="">
                      @endif
                    </div>
                    <div class="span4">
                      <h3>{{$product['product_name']}}</h3>
                      <hr class="soft"/>
                      <h5>{{$product['product_code']}} | {{$product['product_color']}} </h5>
                      <p>
                        {{$product['description']}}
                      </p>
                      <a class="btn btn-small pull-right" href="{{url($product['id'])}}">View Details</a>
                      <br class="clr"/>
                    </div>
                    <div class="span3 alignR">
                      <form class="form-horizontal qtyFrm">
                        <h3> ৳.{{$product['product_price']}}</h3>
                        <label class="checkbox">
                          <input type="checkbox">  Adds product to compair
                        </label><br/>
                        <div class="btn-group">
                        <a href="#" class="btn btn-large btn-primary"> Add to <i class="fas fa-cart-plus"></i></a>
                          <a href="{{url($product['id'])}}" class="btn btn-large"><i class="fas fa-search-plus"></i></a>
                        </div>
                      </form>
                    </div>
                  </div>
                  <hr class="soft"/>
                @endforeach
              </div>


              <div class="tab-pane active" id="blockView">
                <ul class="thumbnails">
                  @foreach($relatedProducts as $reproduct)
                    <li class="span3">
                    <div class="thumbnail">
                      <a href="{{url($reproduct['id'])}}">
                          <?php $product_image_path = "backEnd/images/products/small/".$reproduct['main_image']; ?>
                          @if(!empty($reproduct['main_image']) && file_exists($product_image_path))
                          <img src="{{asset($product_image_path)}}" alt="">
                          @else
                          <img src="{{asset('backEnd/images/products/small/no-image.png')}}" alt="">
                          @endif
                      </a>
                      <div class="caption">
                        <h5>{{$reproduct['product_name']}}</h5>
                        <p>
                          {{$reproduct['product_code']}} | {{$product['product_color']}}
                        </p>
                        <h4 style="text-align:center"><a class="btn" href="{{url($reproduct['id'])}}"> <i class="fas fa-search-plus"></i></a> <a class="btn" href="#">Add to <i class="fas fa-cart-plus"></i></a> <a class="btn btn-primary" href="#">৳.{{$product['product_price']}}</a></h4>
                      </div>
                    </div>
                  </li>
                  @endforeach
                </ul>
                <hr class="soft"/>
              </div>
            </div>
            <br class="clr">
        </div>
        @if(isset($productDetails['product_video']) && !empty($productDetails['product_video']))
        <div class="tab-pane fade" id="video">
          <video width="640" height="480" controls="">
              <source src="{{url('videos/'.$productDetails['product_video'])}}" type="video/mp4">
          </video>
        </div>
        @endif
        <div class="tab-pane fade" id="review">
            <div class="row">
              <div class="span4">
                <h3>Write Review</h3>
                <form action="{{url('add-rating')}}" method="post">
                  @csrf 
                  <input type="hidden" name="product_id" value="{{$productDetails['id']}}">
                  <div class="star-rating">
                    <input type="radio" id="5-stars" name="rating" value="5" />
                    <label for="5-stars" class="star">&#9733;</label>
                    <input type="radio" id="4-stars" name="rating" value="4" />
                    <label for="4-stars" class="star">&#9733;</label>
                    <input type="radio" id="3-stars" name="rating" value="3" />
                    <label for="3-stars" class="star">&#9733;</label>
                    <input type="radio" id="2-stars" name="rating" value="2" />
                    <label for="2-stars" class="star">&#9733;</label>
                    <input type="radio" id="1-star" name="rating" value="1" />
                    <label for="1-star" class="star">&#9733;</label>
                  </div>
                  
                  <div class="form-group">
                    <label for="">Your Review</label>
                    <textarea name="review" required="" style="width:300px; height:50px;"></textarea>
                  </div>
                  <div>&nbsp;</div>
                  <div class="form-group">
                    <input class="btn btn-md" type="submit" value="submit">
                  </div>
                </form>
              </div>
              <div class="span4">
                @if(count($ratings)>0)
                  @foreach($ratings as $rating)
                    <div>
                   
                      <p>
                       
                        <?php 
                        $count =1;
                        while($count<=$rating['rating']){ ?>
                          <span>&#9733;</span>
                        <?php $count ++; } ?>
                      </p>
                     
                      <p>{{$rating['review']}}</p>
                      <p>By :{{$rating['user']['name']}}</p>
                      <p>{{date('d-m-Y', strtotime($rating['created_at']))}}</p>
                    </div>
                  @endforeach
                @else 
                    <p>Review are not abailable for this product!</b>
                @endif 
              </div>
            </div>
          </div>
         
      </div>
    </div>
  </div>
@endsection
@section("front_js")

@endsection

