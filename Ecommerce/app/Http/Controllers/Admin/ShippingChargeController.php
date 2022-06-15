<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ShippingCharge;
use App\Models\AdminsRole;
use Auth;
use Session;

class ShippingChargeController extends Controller
{
    public function shippingCharge(){
        $shipingModulCount = AdminsRole::where(['admin_id'=>Auth::guard('admin')->user()->id,'module'=>'category'])->count();
        if(Auth::guard('admin')->user()->type == "superadmin"){
            $shipingModul['view_access'] = 1;
            $shipingModul['edit_access'] = 1;
            $shipingModul['full_access'] = 1;
        }else if($shipingModulCount == 0){
            $message ="The Feature is restried for you !";
            Session::flash('error_message',$message);
            return redirect("admin/dashboard");
        }else{
            $shipingModul = AdminsRole::where(['admin_id'=>Auth::guard('admin')->user()->id,'module'=>'category'])->first()->toArray();

        }
        $shipping_charges = ShippingCharge::get()->toArray();

        return view("admin.shipping.view_shipping_charges")->with(compact('shipping_charges','shipingModul'));
    }

    public function updateShippingChargeStatus(Request $request){
    	if ($request->ajax()) {
    		$data = $request->all();
    		// echo "<pre>"; print_r($data); die;
    		if ($data['status']=="Active") {
    			$status = 0;
    		}else{
    			$status = 1;
    		}
    		ShippingCharge::where('id',$data['shipping_id'])->update(['status'=>$status]);
    		return response()->json(['status'=>$status,'shipping_id'=>$data['shipping_id']]);
    	}
    }

    public function editShippingCgarges(Request $request, $id){
        if($request->isMethod('post')){
            $data = $request->all();
            ShippingCharge::where('id',$id)->update(['0_500g'=>$data['0_500g'],'501g_1000g'=>$data['501g_1000g'],'1001g_2000g'=>$data['1001g_2000g'],'2001g_3000g'=>$data['2001g_3000g'],'3001g_4000g'=>$data['3001g_4000g'],'above_5000g'=>$data['above_5000g']]);
            return redirect('admin/shipping-charges')->with("success_message","shipping charge updated has been Successfully!");
        }
        $shipping_charge = ShippingCharge::where('id',$id)->first()->toArray();
        return view("admin.shipping.edit_shipping_charge")->with(compact('shipping_charge'));
    }
}
