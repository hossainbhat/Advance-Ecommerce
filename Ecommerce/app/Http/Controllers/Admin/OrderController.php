<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Models\OrdersLog;
use App\Models\OrderStatus;
use App\Models\Order;
use App\Models\User;
use App\Models\Sms;
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
        $orderLog = OrdersLog::where('order_id',$id)->orderBy('id','DESC')->get()->toArray();
        // dd($orderDetails);die;
        return view("admin.orders.order_details")->with(compact('orderDetails','userDetails','orderStatus','orderLog'));
    }

    public function updateOrderStatus(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;
            Order::where('id',$data['order_id'])->update(['order_status'=>$data['order_status']]);
            $message = 'Order Status has been update successfull !';

            //update curier name and traking number
            if(!empty($data['courier_name']) && !empty($data['traking_number'])){
                Order::where('id',$data['order_id'])->update(['courier_name'=>$data['courier_name'],'traking_number'=>$data['traking_number']]);
            }
            //get user mobile
            $deliveryDetails = Order::select('mobile','email','name')->where('id',$data['order_id'])->first()->toArray();
              //send sms
            $message ="Dear Customer, Your order ".$data['order_id']." status has been updated ".$data['order_status']." to shiped place with OnlineStoreBD.com";
            $mobile= $deliveryDetails['mobile'];
            Sms::sendSms($message,$mobile);

            //send order status email
            $orderDetails = Order::with('orders_products')->where('id',$data['order_id'])->first()->toArray();
            // echo "<pre>"; print_r($orderDetails); die;
            //send email
            $email = $deliveryDetails['email'];
            $messageData = [
              'email' => $email,
              'name' => $deliveryDetails['name'],
              'order_id' =>$data['order_id'],
              'order_status' =>$data['order_status'],
              'orderDetails' =>$orderDetails
            ];
            Mail::send('emails.order_status',$messageData, function($message) use($email){
              $message->to($email)->subject('Order status update - OnlineStoreBD.com');
            });
        }
    
        Session::flash('success_message',$message);

        $log = new OrdersLog;
        $log->order_id = $data['order_id'];
        $log->order_status = $data['order_status'];
        $log->save();
        return redirect()->back();
    }
}
