<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
class IndexController extends Controller
{
  
    public function index(){
    	//Featured Products 
    	$featuredItemCount = Product::where('is_featured','Yes')->where('status',1)->count();
    	$featuredItem = Product::where('is_featured','Yes')->where('status',1)->get()->toArray();
    	// dd($featuredItem); die;
    	$featuredItemChunk = array_chunk($featuredItem, 4);
    	// echo "<pre>"; print_r($featuredItemChunk);die;
    	//Latest Products
    	$newProduct = Product::orderBy('id','Desc')->where('status',1)->limit(30)->get()->toArray();
    	$page_name = "index";
    	return view('front.index')->with(compact('page_name','featuredItemChunk','featuredItemCount','newProduct'));
    }
}
