<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Coupon;
use App\Models\Section;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;

class CouponController extends Controller
{
    public function coupons(){
        $coupons = Coupon::get();
        return view('admin.coupon.coupons',compact('coupons'));
    }

    public function updateCouponStatus(Request $request){
        if ($request->ajax()) {
    		$data = $request->all();
    		// echo "<pre>"; print_r($data); die;
    		if ($data['status']=="Active") {
    			$status = 0;
    		}else{
    			$status = 1;
    		}
    		Coupon::where('id',$data['coupon_id'])->update(['status'=>$status]);
    		return response()->json(['status'=>$status,'coupon_id'=>$data['coupon_id']]);
    	}
    }
    public function addEditCoupon(Request $request,$id=null){
        if ($id=="") {
            $name ="Add Coupon";
            $coupon = new Coupon;
            $selectUsers = array();
            $selectCats = array();
            $message ="Coupon Add Successfully!";
    }else{
            $name ="Edit Coupon";
            $coupon = Coupon::find($id);
            $selectUsers = explode(',',$coupon['users']);
            $selectCats = explode(',',$coupon['categories']);
            $message ="Coupon Update Successfully!";
        }
    if ($request->isMethod('post')) {
     
        $data = $request->all();
        //  echo "<pre>"; print_r($data);
   
        $rulse = [
            'coupon_option' => 'required',
            'categories' => 'required',
            'coupon_type' => 'required',
            'amount' => 'required|numeric',
            'amount_type' => 'required',
            'expiry_date' => 'required',
        ];

        $customMessage = [
            'coupon_option.required' =>'coupon option is required',
            'categories.required' =>'categories is required',
            'coupon_type.required' =>'coupon type is required',
            'amount.required' =>'amount is required',
            'amount_type.required' =>'amount type is required',
            'expiry_date.required' =>'expiry date is required',
        ];
        $this->validate($request,$rulse,$customMessage);

        if(isset($data['users'])){
            $users = implode(',',$data['users']);
        }else{
            $users ="";
        }
        if(isset($data['categories'])){
            $categories = implode(',',$data['categories']);
        }
            // echo $users;
            // echo $categories;die;
        if($data['coupon_option']=='Automatic'){
            $coupon_code = Str::random(8);
        }else{
            $coupon_code = $data['coupon_code'];
        }

        $coupon->coupon_option =$data['coupon_option'];
        $coupon->coupon_code =$coupon_code;
        $coupon->categories =$categories;
        $coupon->users =$users;
        $coupon->coupon_type =$data['coupon_type'];
        $coupon->amount_type =$data['amount_type'];
        $coupon->amount =$data['amount'];
        $coupon->expiry_date =$data['expiry_date'];
        $coupon->status =1;
        $coupon->save();

        Session::flash('success_message',$message);
        return redirect("admin/coupons");
        
        }
        $users = User::select('email')->where('status',1)->get();
        $categories = Section::with('categories')->get();
  
        return view('admin.coupon.add_edit_coupon',compact('coupon','name','categories','users','selectUsers','selectCats'));
    }

    public function deleteCoupon($id){

        Coupon::where('id',$id)->delete();
        return redirect()->back()->with("success_message","Coupon has been deleted Successfully!");
    }
}
