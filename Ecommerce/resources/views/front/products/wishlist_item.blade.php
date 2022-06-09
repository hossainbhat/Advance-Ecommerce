<table class="table table-bordered">
        <thead>
        <tr>
            <th>Product</th>
            <th>Description</th>
            <th>Price</th>
            <th>View / Delete</th>
        </tr>
        </thead>
        <tbody>
            
            @foreach($userWishlistItems as $item)
            <tr>
            <td> <img width="60" src="{{asset('backEnd/images/products/small/'.$item['product']['main_image'])}}" alt=""/></td>
            <td>{{$item['product']['product_name']}}<br/>Color : {{$item['product']['product_color']}} | Code : {{$item['product']['product_code']}}</td>
            <td>৳.{{$item['product']['product_price']}}</td>
            <td>
                <div class="input-append">
                
                    <a href="{{url($item['product']['id'])}}"><button class="btn btnItemUpdate" type="button"><i class="fas fa-file"></i></button></a>
                    <button class="btn btn-danger wishlistItemDelete" data-wishlistid="{{$item['id']}}" type="button"><i class="fas fa-times"></i></button>
                </div>
            </td>
            @endforeach
    
    </table>