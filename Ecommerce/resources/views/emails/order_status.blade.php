<!DOCTYPE html>
<body>
    <table style="width:700px;">
        <tr><td>&nbsp;</td></tr>
        <tr>
            <td><img src="{{asset('front/images/logo_email.png')}}" alt=""></td>
        </tr>
        <tr><td>&nbsp;</td></tr>
        <tr><td>Hello {{$name}},</td></tr>
        <tr><td>&nbsp;</td></tr>
        <tr><td>Your Order #{{$order_id}} status has been updated to {{$order_status}}. Your Order Details are as below:-</td></tr>
        <tr><td>&nbsp;</td></tr>
        <tr><td>Order No: {{$order_id}}</td></tr>
        <tr><td>&nbsp;</td></tr>
        <tr><td>
            <table style="width:95%" cellspacing="5" collspacing="5" bgcolor="#f7f4f4">
                <tr bgcolor="#cccccc">
                    <td>Product Name</td>
                    <td>Code</td>
                    <td>Size</td>
                    <td>Color</td>
                    <td>Quantity</td>
                    <td>Price</td>
                </tr>
                @foreach($orderDetails['orders_products'] as $order)
                <tr>
                    <td>{{$order['product_name']}}</td>
                    <td>{{$order['product_code']}}</td>
                    <td>{{$order['product_size']}}</td>
                    <td>{{$order['product_color']}}</td>
                    <td>{{$order['product_qty']}}</td>
                    <td>{{$order['product_price']}} Tk</td>
                </tr>
                <tr>
                    <td colspan="5" align="right">Shipping Charges</td>
                    <td>Tk {{$orderDetails['shipping_charge']}}</td>
                </tr>
                <tr>
                    <td colspan="5" align="right">Coupon Discount</td>
                    <td>Tk 
                    @if($orderDetails['coupon_amount'] >0)    
                        {{$orderDetails['coupon_amount']}}</td>
                    @else 
                        0
                    @endif
                </tr>
                <tr>
                    <td colspan="5" align"right">Grand Total</td>
                    <td>Tk {{$orderDetails['grand_total']}}</td>
                </tr>
                @endforeach
            </table>
        </td></tr>
        <tr><td>&nbsp;</td></tr>
        <tr><td>
            <table>
                <tr>
                    <td><strong>Delivery Address :</strong></td>
                </tr>
                <tr>
                    <td>{{$orderDetails['name']}}</td>
                </tr>
                <tr>
                    <td>{{$orderDetails['address']}}</td>
                </tr>
                <tr>
                    <td>{{$orderDetails['city']}}</td>
                </tr>
                <tr>
                    <td>{{$orderDetails['state']}}</td>
                </tr>
                <tr>
                    <td>{{$orderDetails['country']}}</td>
                </tr>
                <tr>
                    <td>{{$orderDetails['pincode']}}</td>
                </tr>
                <tr>
                    <td>{{$orderDetails['mobile']}}</td>
                </tr>
            </table>
            <tr><td>&nbsp;</td></tr>
            <tr><td>For Any enquiries, You can Contact Us at <a href="#">Online StoreBD.com</a></td></tr>
            <tr><td>&nbsp;</td></tr>
            <tr><td>Regards,<br> Team Online StoreBD</td></tr>
            <tr><td>&nbsp;</td></tr>
        </td></tr>
    </table>
</body>
</html>