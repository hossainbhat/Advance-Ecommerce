<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use Auth;

class OrderController extends Controller
{
    public function orders(){
        $orders = Order::with('orders_products')->where('user_id',Auth::user()->id)->orderBy('id','DESC')->get()->toArray();
        // dd($orders);die;
        return view("front.orders.orders")->with(compact('orders'));
    }

    public function orderDetails($id){
        $orderDetails = Order::with('orders_products')->where('id',$id)->first()->toArray();
        // dd($orderDetails);die;
        return view("front.orders.order_details")->with(compact('orderDetails'));

    }

}
