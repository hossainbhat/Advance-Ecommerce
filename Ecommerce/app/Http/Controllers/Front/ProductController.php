<?php

namespace App\Http\Controllers\Front;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use App\Models\ProductsAttribute;
use App\Models\Category;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Coupon;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

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
}
