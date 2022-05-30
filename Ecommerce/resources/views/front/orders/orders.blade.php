@extends("layouts.front_layouts.front_layout")
@section('front_css')
<style>
form.cmxform label.error, label.error {
    color: red;
    font-style: italic;
}
</style>
@endsection
@section("content")
<div class="span9">
    <ul class="breadcrumb">
		<li><a href="{{url('/')}}">Home</a> <span class="divider">/</span></li>
		<li class="active">Orders</li>
    </ul>
	<h3> Orders</h3>	
	<hr class="soft"/>
	
	    <div class="row">
	
            <div class="span8">
                <table class="table table-striped table-bordered">
                    <tr>
                        <td>Order Id</td>
                        <td>Order Product</td>
                        <td>Payment Method</td>
                        <td>Grend Total</td>
                        <td>Created On</td>
                        <td>Detaisls</td>
                    </tr>
                    @foreach($orders as $order)
                    <tr>
                        <td>{{$order['id']}}</td>
                        <td>
                            @foreach($order['orders_products'] as $pro)
                                {{$pro['product_code']}} <br>
                            @endforeach
                        </td>
                        <td>{{$order['payment_method']}}</td>
                        <td>{{$order['grand_total']}} .Tk</td>
                        <td>{{date('d-M-Y', strtotime($order['created_at']))}}</td>
                        <td><a style="text-decoration:underline" href="{{url('orders/'.$order['id'])}}">View Details</a></td>
                    </tr>
                    @endforeach
                </table>
            </div>
		
	    </div>
	</div>	
	
</div>
@endsection