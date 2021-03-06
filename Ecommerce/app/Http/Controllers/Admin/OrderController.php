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
use App\Models\AdminsRole;
use Carbon\Carbon;
use Dompdf\Dompdf;
use Session;
use Auth;

class OrderController extends Controller
{
    public function orders(){
        $orders = Order::with('orders_products')->orderBy('id','DESC')->get()->toArray();
        $orderModulCount = AdminsRole::where(['admin_id'=>Auth::guard('admin')->user()->id,'module'=>'category'])->count();
        if(Auth::guard('admin')->user()->type == "superadmin"){
            $orderModul['view_access'] = 1;
            $orderModul['full_access'] = 1;
        }else if($orderModulCount == 0){
            $message ="The Feature is restried for you !";
            Session::flash('error_message',$message);
            return redirect("admin/dashboard");
        }else{
            $orderModul = AdminsRole::where(['admin_id'=>Auth::guard('admin')->user()->id,'module'=>'category'])->first()->toArray();

        }
        // dd($orders);die;
        return view("admin.orders.orders")->with(compact('orders','orderModul'));
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
              'courier_name' =>$data['courier_name'],
              'traking_number' =>$data['traking_number'],
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

    public function viewOrderInvoice($id){
      $orderDetails = Order::with('orders_products')->where('id',$id)->first()->toArray();
      $userDetails = User::where('id',$orderDetails['user_id'])->first()->toArray();
      return view("admin.orders.order_invoice")->with(compact('orderDetails','userDetails'));
    }
    public function printPDFInvoice($id){
      $orderDetails = Order::with('orders_products')->where('id',$id)->first()->toArray();
      $userDetails = User::where('id',$orderDetails['user_id'])->first()->toArray();

   

      $dompdf = new Dompdf();

      $output = '
      <!DOCTYPE html>
      <html lang="en">
      <head>
        <meta charset="utf-8">
        <title>Example 2</title>
        <style>
        @font-face {
          font-family: SourceSansPro;
          src: url(SourceSansPro-Regular.ttf);
        }
        
        .clearfix:after {
          content: "";
          display: table;
          clear: both;
        }
        
        a {
          color: #0087C3;
          text-decoration: none;
        }
        
        body {
          position: relative;
          width: 21cm;  
          height: 29.7cm; 
          margin: 0 auto; 
          color: #555555;
          background: #FFFFFF; 
          font-family: Arial, sans-serif; 
          font-size: 14px; 
          font-family: SourceSansPro;
        }
        
        header {
          padding: 10px 0;
          margin-bottom: 20px;
          border-bottom: 1px solid #AAAAAA;
        }
        
        #logo {
          float: left;
          margin-top: 8px;
        }
        
        #logo img {
          height: 70px;
        }
        
        #company {
          float: right;
          text-align: right;
        }
        
        
        #details {
          margin-bottom: 50px;
        }
        
        #client {
          padding-left: 6px;
          border-left: 6px solid #0087C3;
          float: left;
        }
        
        #client .to {
          color: #777777;
        }
        
        h2.name {
          font-size: 1.4em;
          font-weight: normal;
          margin: 0;
        }
        
        #invoice {
          float: right;
          text-align: right;
        }
        
        #invoice h1 {
          color: #0087C3;
          font-size: 2.4em;
          line-height: 1em;
          font-weight: normal;
          margin: 0  0 10px 0;
        }
        
        #invoice .date {
          font-size: 1.1em;
          color: #777777;
        }
        
        table {
          width: 100%;
          border-collapse: collapse;
          border-spacing: 0;
          margin-bottom: 20px;
        }
        
        table th,
        table td {
          padding: 20px;
          background: #EEEEEE;
          text-align: center;
          border-bottom: 1px solid #FFFFFF;
        }
        
        table th {
          white-space: nowrap;        
          font-weight: normal;
        }
        
        table td {
          text-align: right;
        }
        
        table td h3{
          color: #57B223;
          font-size: 1.2em;
          font-weight: normal;
          margin: 0 0 0.2em 0;
        }
        
        table .no {
          color: #FFFFFF;
          font-size: 1.6em;
          background: #57B223;
        }
        
        table .desc {
          text-align: left;
        }
        
        table .unit {
          background: #DDDDDD;
        }
        
        table .qty {
        }
        
        table .total {
          background: #57B223;
          color: #FFFFFF;
        }
        
        table td.unit,
        table td.qty,
        table td.total {
          font-size: 1.2em;
        }
        
        table tbody tr:last-child td {
          border: none;
        }
        
        table tfoot td {
          padding: 10px 20px;
          background: #FFFFFF;
          border-bottom: none;
          font-size: 1.2em;
          white-space: nowrap; 
          border-top: 1px solid #AAAAAA; 
        }
        
        table tfoot tr:first-child td {
          border-top: none; 
        }
        
        table tfoot tr:last-child td {
          color: #57B223;
          font-size: 1.4em;
          border-top: 1px solid #57B223; 
        
        }
        
        table tfoot tr td:first-child {
          border: none;
        }
        
        #thanks{
          font-size: 2em;
          margin-bottom: 50px;
        }
        
        #notices{
          padding-left: 6px;
          border-left: 6px solid #0087C3;  
        }
        
        #notices .notice {
          font-size: 1.2em;
        }
        
        footer {
          color: #777777;
          width: 100%;
          height: 30px;
          position: absolute;
          bottom: 0;
          border-top: 1px solid #AAAAAA;
          padding: 8px 0;
          text-align: center;
        }
        
        </style>
      </head>
        <body>
          <header class="clearfix">
            <div id="logo">
             <h2>ORDER INVOICE</h2>
            </div>
            </div>
          </header>
          <main>
            <div id="details" class="clearfix">
              <div id="client">
                <div class="to">INVOICE TO:</div>
                <h2 class="name">'.$orderDetails['name'].'</h2>
                <div class="address">'.$orderDetails['address'].', '.$orderDetails['city'].', '.$orderDetails['state'].'</div>
                <div class="address">'.$orderDetails['country'].','.$orderDetails['pincode'].'</div>
                <div class="email"><a href="mailto:'.$orderDetails['email'].'">'.$orderDetails['email'].'</a></div>
              </div>
              <div id="invoice">
                <h1>INVOICE ID '.$orderDetails['id'].'</h1>
                <div class="date">Order Date: '.date('d-M-Y', strtotime($orderDetails['created_at'])).'</div>
                <div class="date">Grand Total: '.$orderDetails['grand_total'].'</div>
                <div class="date">Order Status: '.$orderDetails['order_status'].'</div>
                <div class="date">Payment Method: '.$orderDetails['payment_method'].'</div>
              </div>
            </div>
            <table border="0" cellspacing="0" cellpadding="0">
              <thead>
                <tr>
                  <th class="unit">Product Code</th>
                  <th class="desc">Color</th>
                  <th class="unit">Size</th>
                  <th class="desc">Price</th>
                  <th class="unit">Quantity</th>
                  <th class="total">Total</th>
                </tr>
              </thead>
              <tbody>';
              $subtotal =0;
              foreach($orderDetails['orders_products'] as $product)
                $output .='<tr>
                  <td class="unit">'.$product['product_code'].'</td>
                  <td class="desc">'.$product['product_color'].'</td>
                  <td class="unit">'.$product['product_size'].'</td>
                  <td class="desc">Tk. '.$product['product_price'].'</td>
                  <td class="unit">'.$product['product_qty'].'</td>
                  <td class="total">Tk. '.$product['product_price']*$product['product_qty'].'</td>
                </tr>';
                $subtotal = $subtotal + ($product['product_price']*$product['product_qty']);
              $output .='</tbody>
              <tfoot>
                <tr>
                  <td colspan="3"></td>
                  <td colspan="2">SUBTOTAL</td>
                  <td>Tk. '.$subtotal.'</td>
                </tr>
                <tr>
                  <td colspan="3"></td>
                  <td colspan="2">Shipping Charge</td>
                  <td>Tk. '.$orderDetails['shipping_charge'].'</td>
                </tr>
                <tr>
                <td colspan="3"></td>
                <td colspan="2">Discount</td>';
                if($orderDetails['coupon_amount']>0){
                  $output .='<td>Tk.'.$orderDetails['coupon_amount'].'</td>';
                }else{
                  $output .= '<td> Tk. 0 </td>';
                }
              $output .='</tr>
                <tr>
                  <td colspan="3"></td>
                  <td colspan="2">GRAND TOTAL</td>
                  <td>Tk. '.$orderDetails['grand_total'].'</td>
                </tr>
              </tfoot>
            </table>
            
          </main>
          <footer>
            Invoice was created on a computer and is valid without the signature and seal.
          </footer>
        </body>
      </html>
      
      ';
      $dompdf->loadHtml($output);

      $dompdf->setPaper('A4', 'landscape');
      $dompdf->render();
      $dompdf->stream();
    }
    



    public function viewOrderChart(){
      $current_menth_orders = Order::whereYear('created_at',Carbon::now()->year)->whereMonth('created_at',Carbon::now()->month)->count();
      $before_1_month_orders = Order::whereYear('created_at',Carbon::now()->year)->whereMonth('created_at',Carbon::now()->subMonth(1))->count();
      $before_2_month_orders = Order::whereYear('created_at',Carbon::now()->year)->whereMonth('created_at',Carbon::now()->subMonth(2))->count();
      $before_3_month_orders = Order::whereYear('created_at',Carbon::now()->year)->whereMonth('created_at',Carbon::now()->subMonth(3))->count();
      $orderCount = array($current_menth_orders,$before_1_month_orders,$before_2_month_orders,$before_3_month_orders);
      return view("admin.orders.view_orders_chart")->with(compact('orderCount'));
    }
}
