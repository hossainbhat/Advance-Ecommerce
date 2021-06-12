<?php

namespace App\Http\Controllers\Front;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ProductsAttribute;
use App\Category;
use App\Product;
use App\Cart;
use Session;
use Auth;
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
        $productDetails = Product::with(['category','brand','attributes'=>function($query){$query-> where('status',1);},'ProductImage'])->find($id)->toArray();
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
          $getProductPrice = ProductsAttribute::where(['product_id'=>$data['product_id'],'size'=>$data['size']])->first();
          return $getProductPrice->price;
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
          $cart = new Cart;
          $cart->session_id = $session_id;
          $cart->product_id = $data['product_id'];
          $cart->size = $data['size'];
          $cart->quantity = $data['quantity'];
          $cart->save();
          $message ="Product has been added in cart";
          Session::flash('success_message',$message);
          return redirect()->back();
        }
      }

      public function cart(){
        $userCartItems = Cart::userCartItems();
        // echo "<pre>"; print_r($userCartItems); die;
        return view('front.products.cart_view')->with(compact('userCartItems'));
      }


}
