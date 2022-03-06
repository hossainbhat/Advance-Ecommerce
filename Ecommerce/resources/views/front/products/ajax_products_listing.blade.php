<?php use App\Models\Product; ?>
<div class="tab-pane  active" id="blockView">
  <ul class="thumbnails">
    @foreach($categoryProduct as $Product)
    <li class="span3">
      <div class="thumbnail">
        <a href="{{url($Product->id)}}">
          @if (isset($Product['main_image']))
          <?php $product_image_path = "backEnd/images/products/small/".$Product['main_image']; ?>
          @else
          <?php $product_image_path = ""; ?>
          @endif
          <?php $product_image_path = "backEnd/images/products/small/".$Product['main_image']; ?>
          @if(!empty($Product['main_image']) && file_exists($product_image_path))
          <img src="{{asset($product_image_path)}}" alt="">
          @else
          <img src="{{asset('backEnd/images/products/small/no-image.png')}}" alt="">
          @endif
        </a>
        <div class="caption">
          <h5>{{ $Product['product_name'] }}</h5>
          <?php $discounted_price = Product::getDiscountedPrice($Product->id); ?>
          <p>
            {{ $Product['brand']['name'] }}  @if($discounted_price>0)
            | ৳.<del>{{ $Product['product_price'] }}</del>
            @endif
          </p>
          <h4 style="text-align:center"><a class="btn" href="{{url($Product->id)}}"> <i class="fas fa-search-plus"></i></a> <a class="btn" href="#">Add to <i class="fas fa-cart-plus"></i></a> <a class="btn btn-primary" href="#">@if($discounted_price>0) ৳.{{ round($discounted_price,0 )}} @else ৳.{{ $Product['product_price'] }} @endif</a></h4>

        </div>
      </div>
    </li>
    @endforeach
  </ul>
  <hr class="soft"/>
</div>
