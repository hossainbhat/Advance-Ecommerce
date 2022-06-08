<?php

namespace App\Http\Controllers\Front;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use App\Models\ProductsAttribute;
use App\Models\ShippingCharge;
use App\Models\Category;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Coupon;
use App\Models\Country;
use App\Models\User;
use App\Models\Order;
use App\Models\Sms;
use App\Models\OrdersProduct;
use App\Models\DeliveryAddress;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use DB;

class ProductController extends Controller
{
    public function listing(Request $request){
        Paginator::useBootstrap();
     if ($request->ajax()) {
       $data = $request->all();
       // echo "<pre>"; print_r($data); die;
       $url = $data['url'];

       $categoryCount = Category::where(['url'=>$url,'status'=>1])->count();
       if ($categoryCount > 0) {
         //echo "category exist"; die;
         $categoryDetails = Category::categoryDetails($url);
         //echo "<pre>"; print_r($categoryDetails); die;
         $categoryProduct = Product::with('brand')->whereIn('category_id',$categoryDetails['catIds'])->where('status',1);
           //echo "<pre>"; print_r($categoryDetails);
           //echo "<pre>"; print_r($categoryProduct); die;
         //if fabric option selected
         if (isset($data['fabric']) && !empty($data['fabric'])) {
             $categoryProduct->whereIn('products.fabric',$data['fabric']);
         }//if sleeve option selected
         if (isset($data['sleeve']) && !empty($data['sleeve'])) {
             $categoryProduct->whereIn('products.sleeve',$data['sleeve']);
         }//if pattern option selected
         if (isset($data['pattern']) && !empty($data['pattern'])) {
             $categoryProduct->whereIn('products.pattern',$data['pattern']);
         }
         //if fit option selected
         if (isset($data['fit']) && !empty($data['fit'])) {
             $categoryProduct->whereIn('products.fit',$data['fit']);
         }
         //if occasion option selected
         if (isset($data['occasion']) && !empty($data['occasion'])) {
             $categoryProduct->whereIn('products.occasion',$data['occasion']);
         }
         //if sort option selected
         if (isset($data['sort']) && !empty($data['sort'])) {
           if ($data['sort'] == 'product_latest') {
             $categoryProduct->orderBy('id','DESC');
           }elseif ($data['sort'] == 'product_name_a_z') {
             $categoryProduct->orderBy('product_name','ASC');
           }elseif ($data['sort'] == 'product_name_z_a') {
             $categoryProduct->orderBy('product_name','DESC');
           }elseif ($data['sort'] == 'price_lowest') {
             $categoryProduct->orderBy('product_price','ASC');
           }elseif ($data['sort'] == 'price_height') {
             $categoryProduct->orderBy('product_price','DESC');
           }
         }else{
           $categoryProduct->orderBy('id','DESC');
         }

         $categoryProduct = $categoryProduct->paginate(30);
           return view('front.products.ajax_products_listing')->with(compact('categoryDetails','categoryProduct','url'));
       }else{
         abort(404);
       }
     }else{
         $url = Route::getFacadeRoot()->current()->uri();
         $categoryCount = Category::where(['url'=>$url,'status'=>1])->count();
         if ($categoryCount > 0) {
           //echo "category exist"; die;
           $categoryDetails = Category::categoryDetails($url);
           //echo "<pre>"; print_r($categoryDetails); die;
           $categoryProduct = Product::with('brand')->whereIn('category_id',$categoryDetails['catIds'])->where('status',1);
             //echo "<pre>"; print_r($categoryDetails);
             //echo "<pre>"; print_r($categoryProduct); die;
             //product Filter
             $productFilters = Product::productFilters();
             $fabricArray = $productFilters['fabricArray'];
             $sleeveArray = $productFilters['sleeveArray'];
             $patternArray = $productFilters['patternArray'];
             $fitArray = $productFilters['fitArray'];
             $occsionArray = $productFilters['occsionArray'];

           $categoryProduct = $categoryProduct->paginate(30);
           $page_name = "listing";
             return view('front.products.listing')->with(compact('categoryDetails','categoryProduct','url','fabricArray','sleeveArray','patternArray','fitArray','occsionArray','page_name'));
         }else{
           abort(404);
         }
       }
     }

     public function product($id=null){
      $productDetails = Product::with(['category','brand','ProductImage','attributes'=>function($query){$query->where('status',1);}])->find($id)->toArray();
      // dd($productDetails); die;
      $total_stock = ProductsAttribute::where('product_id',$id)->sum('stock');
      $relatedProducts = Product::where('category_id',$productDetails['category']['id'])->where('id','!=',$id)->limit(3)->inRandomOrder()->get()->toArray();
      // dd($relatedProducts); die;
      return view('front.products.detail')->with(compact('productDetails','total_stock','relatedProducts'));
      }

      public function getProductPrice(Request $request){
        if ($request->ajax()) {
          $data = $request->all();
          //echo "<pre>"; print_r($data); die;
          $getDiscountedAttrPrice = Product::getDiscountedAttrPrice($data['product_id'],$data['size']);
          
          return $getDiscountedAttrPrice;
        }
      }



      public function addtocart(Request $request){
        if($request->isMethod('post')){
          $data = $request->all();
          // echo "<pre>"; print_r($data); die;
          $getProductStock = ProductsAttribute::where(['product_id'=>$data['product_id'],'size'=>$data['size']])->first()->toArray();
          // echo $getProductStock['size']; die;
          if($getProductStock['stock']<$data['quantity']){
            $message ="Required quantity is not avaliable!";
            Session::flash('error_message',$message);
            return redirect()->back();
          }

          //generate session id not apc_exists
          $session_id = Session::get('session_id');
          if(empty($session_id)){
            $session_id = Session::getId();
            Session::put('session_id',$session_id);
          }
          //check count product
          if(Auth::check()){
            $countProducts = Cart::where(['product_id'=>$data['product_id'],'size'=>$data['size'],'user_id'=>Auth::user()->id])->count();
          }else{
            $countProducts = Cart::where(['product_id'=>$data['product_id'],'size'=>$data['size'],'session_id'=>Session::get('session_id')])->count();
          }

          if ($countProducts>0) {
            $message ="Product already exists in cart!";
            Session::flash('error_message',$message);
            return redirect()->back();
          }
          //save cart products
          // Cart::insert(['session_id'=>$session_id,'product_id'=>$data['product_id'],'size'=>$data['size'],'quantity'=>$data['quantity']]);
          //
          if(Auth::check()){
            $user_id = Auth::user()->id;
          }else{
            $user_id =0;
          }

          $cart = new Cart;
          $cart->session_id = $session_id;
          $cart->user_id = $user_id;
          $cart->product_id = $data['product_id'];
          $cart->size = $data['size'];
          $cart->quantity = $data['quantity'];
          $cart->save();
          $message ="Product has been added in cart";
          Session::flash('success_message',$message);
          return redirect('cart');
        }
      }

      public function cart(){
        $userCartItems = Cart::userCartItems();
        // echo "<pre>"; print_r($userCartItems); die;
        return view('front.products.cart_view')->with(compact('userCartItems'));
      }

      public function updateCartItemQty(Request $request){
        if($request->ajax()){
          $data = $request->all();
          // echo "<pre>"; print_r($data);die;
          //cart details 
          $cartDetails = Cart::find($data['cartid']);
          //avalable product stock
          $availavleStock = ProductsAttribute::select('stock')->where(['product_id'=>$cartDetails['product_id'],'size'=>$cartDetails['size']])->first()->toArray();
          // echo $data['qty'];
          // echo "<br>";
          // echo $availavleStock['stock']; die;
          if($data['qty']>$availavleStock['stock']){
            $userCartItems = Cart::userCartItems();
         
            return response()->json([
              'status'=>false,
              
              'message'=>'stock is not avalable!',
              'view'=>(String)View::make('front.products.cart_items')->with(compact('userCartItems'))
            ]);
          }
          //check status stock
          $availavleSize = ProductsAttribute::where(['product_id'=>$cartDetails['product_id'],'size'=>$cartDetails['size'],'status'=>1])->count();
          if($availavleSize==0){
            $userCartItems = Cart::userCartItems();
            
            return response()->json([
              'status'=>false,
              'message'=>'size is not avalable!',
              'view'=>(String)View::make('front.products.cart_items')->with(compact('userCartItems'))
            ]);
          }
          Cart::where('id',$data['cartid'])->update(['quantity'=>$data['qty']]);
          $userCartItems = Cart::userCartItems();
          $totalCartItems = totalCartItems();
          return response()->json([
            'status'=>true,
            'totalCartItems'=>$totalCartItems,
            'view'=>(String)View::make('front.products.cart_items')->with(compact('userCartItems'))
          ]);

        }
      }

      public function deleteCartItem(Request $request){
        if($request->ajax()){
          $data = $request->all();
          // echo "<pre>"; print_r($data);die;
          Cart::where('id',$data['cartid'])->delete();
          $userCartItems = Cart::userCartItems();
          $totalCartItems = totalCartItems();
            return response()->json([
              'totalCartItems'=>$totalCartItems,
              'view'=>(String)View::make('front.products.cart_items')->with(compact('userCartItems'))
            ]);
          }
      }

      public function applyCoupon(Request $request){
        if($request->ajax()){
          $data = $request->all();
          $userCartItems = Cart::userCartItems();
          $couponCount = Coupon::where('coupon_code',$data['code'])->count();
          if($couponCount==0){
            $userCartItems = Cart::userCartItems();
            $totalCartItems = totalCartItems();
            Session::forget('couponCode');
            Session::forget('couponAmount');
            return response()->json([
              'status'=>false,
              'message'=>'This coupon is not valid', 
              'totalCartItems'=>$totalCartItems,
              'view'=>(String)View::make('front.products.cart_items')->with(compact('userCartItems'))
            ]);
          }else{
            //other coupon condition

            //coupon inactive
          $couponDetails = Coupon::where('coupon_code',$data['code'])->first();
          if($couponDetails->status==0){
            $message = "This coupon is not active";
          }

          $expiry_date = $couponDetails->expiry_date;
          $current_date = date('Y-m-d');
          if($expiry_date < $current_date){
            $message = "This coupon is expired";
          }

          //single time use coupon check
          if($couponDetails->coupon_type =="Single Time"){
            $couponCount = Order::where(['coupon_code'=>$data['code'],'user_id'=>Auth::user()->id])->count();
            if($couponCount >= 1){
              $message ="This coupon code is already availed by you!";
            }
          }

          //check category 
          $catArr = explode(",",$couponDetails->categories);

          $userCartItems = Cart::userCartItems();
          // echo "<pre>"; print_r($userCartItems); die;
       
          //check user email
          if(!empty($couponDetails->users)){
            $userArr = explode(",",$couponDetails->users);

            foreach($userArr as $key =>$user){
              $getUserID = User::select('id')->where('email',$user)->first()->toArray();
              $userID[] = $getUserID['id'];
            }
          }
       
          $total_amount = 0;
          foreach($userCartItems as $key => $item){
            if(!in_array($item['product']['category_id'],$catArr)){
              $message ="This coupon code is not for one of the selected product!";
            }
            if(!empty($couponDetails->users)){
              if(!in_array($item['user_id'],$userID)){
                $message ="This coupon code is not for you!";
              }
            }

            $attrPrice = Product::getDiscountedAttrPrice($item['product_id'],$item['size']);
            $total_amount = $total_amount + ($attrPrice['final_price']*$item['quantity']);

          }
          // echo $couponDetails->amount / 100; die;
          if(isset($message)){
            $userCartItems = Cart::userCartItems();
            $totalCartItems = totalCartItems();
            $couponAmount = 0;
            return response()->json([
              'status'=>false,
              'message'=>$message, 
              'couponAmount'=>$couponAmount,
              'totalCartItems'=>$totalCartItems,
              'view'=>(String)View::make('front.products.cart_items')->with(compact('userCartItems'))
            ]);
          }else{
            // echo "coupon can apply succussfully!";
            if($couponDetails->amount_type =="Fixt"){
              $couponAmount = $couponDetails->amount;
            }else{
              $couponAmount = round($total_amount * $couponDetails->amount / 100);
            }
            // echo $couponAmount; die;
            $grand_total = $total_amount - $couponAmount;
            Session::put('couponAmount',$couponAmount);
            Session::put('couponCode',$data['code']);

            $message ="coupon code successfully applied. you are avalable discount";
            $userCartItems = Cart::userCartItems();
            $totalCartItems = totalCartItems();
            return response()->json([
              'status'=>true,
              'message'=>$message, 
              'totalCartItems'=>$totalCartItems,
              'couponAmount'=>$couponAmount,
              'grand_total'=>$grand_total,
              'view'=>(String)View::make('front.products.cart_items')->with(compact('userCartItems'))
            ]);
          }
          }
        }
      }

      public function checkout(Request $request){
        $userCartItems = Cart::userCartItems();

        if(count($userCartItems)==0){
          $message ="Shopping cart is empty!. please add product to cseckout";
          Session::put('error_message',$message);
          return redirect('cart');
        }

        $total_price =0;
        $total_weight =0;
        foreach($userCartItems as $item){
          $product_weight = $item['product']['product_weight'];
          $total_weight = $total_weight + $product_weight;
          $attrPrice = Product::getDiscountedAttrPrice($item['product_id'],$item['size']);
          $total_price = $total_price + ( $attrPrice['final_price'] * $item['quantity']);

        }
        $deliveryAddress = DeliveryAddress::deliveryAddress();
        // dd($deliveryAddress);die;
        foreach($deliveryAddress as $key => $value){
         $shippingCharges = ShippingCharge::getShippingCharges($total_weight,$value['country']);
         $deliveryAddress[$key]['shipping_charges'] = $shippingCharges;
        }
        if($request->isMethod('post')){
          $data = $request->all();
          // echo Session::get('grand_total');
          if(empty($data['address_id'])){
            $message = "please select delivary address";
            Session::flash('error_message',$message);
            return redirect()->back();
          }
          if(empty($data['payment_getwaya'])){
            $message = "please select Payment Method";
            Session::flash('error_message',$message);
            return redirect()->back();
          }
          // echo "<pre>"; print_r($data); die;
          if($data['payment_getwaya']=='COD'){
            $payment_method = "COD";
          }else{
            echo "comming soon"; die;
            $payment_method = "Prepaid";
          }

          $dalivaryAddress = DeliveryAddress::where('id',$data['address_id'])->first()->toArray();
          // dd($dalivaryAddress);die;
          $shipping_charge = ShippingCharge::getShippingCharges($total_weight,$dalivaryAddress['country']);
         
          $grand_total = $total_price + $shipping_charge - Session::get('couponAmount');
          // dd($grand_total);die;
          //insert grand total 
          Session::put('grand_total',$grand_total);

          DB::beginTransaction();

          $order = new Order;
          $order->user_id = Auth::user()->id;
          $order->name = $dalivaryAddress['name'];
          $order->address = $dalivaryAddress['address'];
          $order->city = $dalivaryAddress['city'];
          $order->state = $dalivaryAddress['state'];
          $order->country = $dalivaryAddress['country'];
          $order->pincode = $dalivaryAddress['pincode'];
          $order->mobile = $dalivaryAddress['mobile'];
          $order->email = Auth::user()->email;
          $order->shipping_charge = $shipping_charge;
          $order->coupon_code = Session::get('couponCode');
          $order->coupon_amount = Session::get('couponAmount');
          $order->order_status = "New";
          $order->payment_method =  $payment_method;
          $order->payment_getwaya = $data['payment_getwaya'];
          $order->grand_total = $grand_total;
          $order->save();

          //get last insert order id
          $order_id = DB::getPdo()->lastInsertId();
          //get user cart item
          $cartItems = Cart::where('user_id',Auth::user()->id)->get()->toArray();
          foreach($cartItems as $key =>$item){
            $cartItem = new OrdersProduct;
            $cartItem->order_id = $order_id;
            $cartItem->user_id = Auth::user()->id;

            $getProductDetails = Product::select('product_code','product_name','product_color')->where('id',$item['product_id'])->first()->toArray();
            $cartItem->product_id = $item['product_id'];
            $cartItem->product_code = $getProductDetails['product_code'];
            $cartItem->product_name = $getProductDetails['product_name'];
            $cartItem->product_color = $getProductDetails['product_color'];
            $cartItem->product_size = $item['size'];
            $getDiscountedAttrPrice = Product::getDiscountedAttrPrice($item['product_id'],$item['size']);
            $cartItem->product_price = $getDiscountedAttrPrice['final_price'];
            $cartItem->product_qty = $item['quantity'];
            $cartItem->save();

            if($data['payment_getwaya']=='COD'){
              //stock minus product
              $getProductStock = ProductsAttribute::where(['product_id'=>$item['product_id'],'size'=>$item['size']])->first()->toArray();
              $newStock = $getProductStock['stock'] - $item['quantity'];
              ProductsAttribute::where(['product_id'=>$item['product_id'],'size'=>$item['size']])->update(['stock'=>$newStock]);
              

            }
          } 
         
          Session::put('order_id',$order_id);
          DB::commit();

          if($data['payment_getwaya']=='COD'){
            //send sms
            $message = "Dear Customer, Your Order ".$order_id." has been successfull placed with Online StoreBD.com. We will intimate you once your order is Shipped";
            $mobile = Auth::user()->mobile;
            Sms::sendSms($message,$mobile);

            $orderDetails = Order::with('orders_products')->where('id',$order_id)->first()->toArray();
            // echo "<pre>"; print_r($orderDetails); die;
            //send email
            $email = Auth::user()->email;
            $messageData = [
              'email' => $email,
              'name' => Auth::user()->name,
              'order_id' =>$order_id,
              'orderDetails' =>$orderDetails
            ];
            Mail::send('emails.order',$messageData, function($message) use($email){
              $message->to($email)->subject('Order Placed - Online StoreBD.com');
            });

            return redirect('/thanks');
          }else{
            echo "prepaid Metod Comming Soon";die;
          }

          echo "order plased"; die;
        }
       
        // dd($deliveryAddress);die;
        return view("front.products.checkout")->with(compact('userCartItems','deliveryAddress','total_price'));
      }


      public function thanks(){
        if(Session::has('order_id')){
          Cart::where('user_id',Auth::user()->id)->delete();
        }else{
          return redirect('/cart');
        }
        return view("front.products.thanks");
      }

      public function addEditDalivaryAddress(Request $request,$id=null,){
        if($id==""){
          $title = "Add Dalivary Address";
          $address = new DeliveryAddress;
          $message ="Dalivary Address added successfully";
        }else{
          $title = "Edit Dalivary Address";
          $address = DeliveryAddress::find($id);
          $message ="Dalivary Address has been updated successfully";
        }

        if($request->isMethod('post')){
          $data = $request->all();
          // echo "<pre>"; print_r($data);die;

          $rulse = [
            'name' => 'required|regex:/^[\pL\s\-]+$/u',
            'address' => 'required',
            'city' => 'required|regex:/^[\pL\s\-]+$/u',
            'state' => 'required|regex:/^[\pL\s\-]+$/u',
            'country' => 'required',
            'pincode' => 'required|numeric',
            'mobile' => 'required|numeric',
        ];

        $customMessage = [
            'name.required' =>'name is required',
            'name.regex' =>'Valid name is required',
            'country.required' =>'country is required',
            'address.required' =>'address is required',
            'city.required' =>'city is required',
            'city.regex' =>'Valid city is required',
            'state.required' =>'state is required',
            'state.regex' =>'Valid state is required',
            'mobile.required' =>'mobile is required',
            'mobile.numeric' =>'Valid mobile is required',
            'pincode.required' =>'pincode is required',
            'pincode.numeric' =>'Valid pincode is required',
            'mobile.required' =>'mobile is required',
            'mobile.numeric' =>'Valid mobile is required',
        ];

        $this->validate($request,$rulse,$customMessage);

        $address->user_id = Auth::user()->id;
        $address->name = $data['name'];
        $address->address = $data['address'];
        $address->city = $data['city'];
        $address->state = $data['state'];
        $address->country = $data['country'];
        $address->pincode = $data['pincode'];
        $address->mobile = $data['mobile'];
        $address->status = 1;
        $address->save();
      
        Session::put('success_message',$message);
        
       
        return redirect('checkout');
        }

        $countries = Country::where('status',1)->get();

        return view("front.products.add_edit_dalivary_address")->with(compact('countries','title','address'));
      }

      public function deleteDalivaryAddress($id){
        DeliveryAddress::where('id',$id)->delete();
        $message ="Deleviry address has been deleted successfully";
        Session::put('success_message',$message);
        return redirect()->back();
      }
}
