<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cart;
use App\Models\ProductsAttribute;

class Product extends Model
{
    use HasFactory;
    public function category(){
		return $this->belongsTo('App\Models\Category','category_id')->select('id','name','url');
    }

    public function section(){
    	return $this->belongsTo('App\Models\Section','section_id')->select('id','name');
    }

    public function brand(){
      return $this->belongsTo('App\Models\Brand','brand_id')->select('id','name');
    }
    public function attributes(){
    	return $this->hasMany('App\Models\ProductsAttribute');
    }

    public function ProductImage(){
    	return $this->hasMany('App\Models\ProductsImage');
    }
    public static function productFilters(){
      $productFilters['fabricArray']  = array('Cotton','Polyster','Wool');
      $productFilters['sleeveArray']  = array('Full Sleve','Half Slave','Short Slave','Sleeveless');
      $productFilters['patternArray']  = array('Checked','Plain','Printed','Self','Solid');
      $productFilters['fitArray']  = array('Regular','Slim');
      $productFilters['occsionArray']  = array('Casual','Formal');

      return $productFilters;
    }

    public static function getDiscountedPrice($product_id){
      $proDetails = Product::select('product_price','product_discount','category_id')->where('id',$product_id)->first()->toArray();
      // echo "<pre>"; print_r($proDetails); die;
      $catDetails = Category::select('discount')->where('id',$proDetails['category_id'])->first()->toArray();

      if($proDetails['product_discount']>0){
        $discounted_price = $proDetails['product_price'] - ($proDetails['product_price'] * $proDetails['product_discount'] / 100);
      }else if($catDetails['discount']>0){
        $discounted_price = $proDetails['product_price'] - ($proDetails['product_price'] * $catDetails['discount'] / 100);
      }else{
        $discounted_price = 0;
      }

      return $discounted_price;
    }

    public static function getDiscountedAttrPrice($product_id,$size){
      $proAttrPrice = ProductsAttribute::where(['product_id'=>$product_id,'size'=>$size])->first()->toArray();
      $proDetails = Product::select('product_discount','category_id')->where('id',$product_id)->first()->toArray();
      // echo "<pre>"; print_r($proDetails); die;
      $catDetails = Category::select('discount')->where('id',$proDetails['category_id'])->first()->toArray();

      if($proDetails['product_discount']>0){
        $final_price = $proAttrPrice['price'] - ($proAttrPrice['price'] * $proDetails['product_discount'] / 100);
        $discount = $proAttrPrice['price'] - $final_price ;
      }else if($catDetails['discount']>0){
        $final_price = $proAttrPrice['price'] - ($proAttrPrice['price'] * $catDetails['discount'] / 100);
        $discount = $proAttrPrice['price'] - $final_price ;
      }else{
        $final_price = $proAttrPrice['price'];
        $discount = 0;
      }

      return array('product_price'=>$proAttrPrice['price'],'final_price'=>$final_price,'discount'=>$discount);
    }

    public static function getProductImage($product_id){
      $getProductImage = Product::select('main_image')->where('id',$product_id)->first()->toArray();
      return $getProductImage['main_image']; 
    }

    public static function getProductStatus($product_id){
      $getProductStatus = Product::select('id','status')->where('id',$product_id)->first()->toArray();
      return $getProductStatus['status'];
    }
    

    public static function getProductStock($product_id,$product_size){
      $getProductStock = ProductsAttribute::select('id','stock')->where(['product_id'=>$product_id,'size'=>$product_size])->first()->toArray();
      return $getProductStock['stock'];
    }

    public static function getAttributeCount($product_id,$product_size){
      $getAttributeCount = ProductsAttribute::where(['product_id'=>$product_id,'size'=>$product_size,'status'=>1])->count();
      return $getAttributeCount;
    }

    public static function getCategoryStatus($category_id){
      $getCategoryStatus =  Category::select('status')->where('id',$category_id)->first()->toArray();
      return $getCategoryStatus['status'];
    }


    public static function deleteCartProduct($product_id){
      Cart::where('product_id',$product_id)->delete();
    }

    
}
