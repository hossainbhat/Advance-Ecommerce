<?php

use App\Models\Cart;
use App\Models\Admin;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
// use Session;

if(!function_exists('totalCartItems')){
    function totalCartItems(){
        if(Auth::check()){
            $user_id = Auth::user()->id;
            $totalCartItems = Cart::where('user_id',$user_id)->sum('quantity');
    
        }else{
            $session_id = Session::get('session_id');
            $totalCartItems = Cart::where('session_id',$session_id)->sum('quantity');
        }
        return $totalCartItems;
    }
    function totalWishlisttems(){
        if(Auth::check()){
            $user_id = Auth::user()->id;
            $totalWishlistItems = Wishlist::where('user_id',$user_id)->count();
    
        }
        return $totalWishlistItems;
    }

}













?>