<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function category(){
		return $this->belongsTo('App\Category','category_id')->select('id','name','url');
    }

    public function section(){
    	return $this->belongsTo('App\Section','section_id')->select('id','name');
    }

    public function brand(){
      return $this->belongsTo('App\Brand','brand_id')->select('id','name');
    }

    public function attributes(){
    	return $this->hasMany('App\ProductsAttribute');
    }

    public function ProductImage(){
    	return $this->hasMany('App\ProductsImage');
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
}
