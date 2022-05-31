<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OrderStatus;
use App\Models\Order;
use App\Models\User;
use Session;
class OrderController extends Controller
{
    public function orders(){
        $orders = Order::with('orders_products')->orderBy('id','DESC')->get()->toArray();
        // dd($orders);die;
        return view("admin.orders.orders")->with(compact('orders'));
    }

    public function orderDetails($id){
        $orderDetails = Order::with('orders_products')->where('id',$id)->first()->toArray();
        $userDetails = User::where('id',$orderDetails['user_id'])->first()->toArray();
        $orderStatus = OrderStatus::where('status',1)->get()->toArray();
        // dd($orderDetails);die;
        return view("admin.orders.order_details")->with(compact('orderDetails','userDetails','orderStatus'));
    }

    public function updateOrderStatus(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;
            Order::where('id',$data['order_id'])->update(['order_status'=>$data['order_status']]);
            $message = 'Order Status has been update successfull !';
        }
        
        Session::flash('success_message',$message);
        return redirect()->back();
    }
}
