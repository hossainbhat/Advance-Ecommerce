<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Rating;
use App\Models\AdminsRole;
use Auth;
use Session;

class RatingController extends Controller
{
    public function Ratings(){
        $ratings = Rating::with(['user','product'])->orderBy('id','DESC')->get()->toArray();
        // dd($ratings);
		$ratingModulCount = AdminsRole::where(['admin_id'=>Auth::guard('admin')->user()->id,'module'=>'category'])->count();
        if(Auth::guard('admin')->user()->type == "superadmin"){
            $ratingModul['view_access'] = 1;
            $ratingModul['full_access'] = 1;
        }else if($ratingModulCount == 0){
            $message ="The Feature is restried for you !";
            Session::flash('error_message',$message);
            return redirect("admin/dashboard");
        }else{
            $ratingModul = AdminsRole::where(['admin_id'=>Auth::guard('admin')->user()->id,'module'=>'category'])->first()->toArray();

        }

        return view("admin.ratings.rating")->with(compact('ratings','ratingModul'));
       
    }

    public function updateRatingStatus(Request $request){
    	if ($request->ajax()) {
    		$data = $request->all();
    		// echo "<pre>"; print_r($data); die;
    		if ($data['status']=="Active") {
    			$status = 0;
    		}else{
    			$status = 1;
    		}
    		Rating::where('id',$data['rating_id'])->update(['status'=>$status]);
    		return response()->json(['status'=>$status,'rating_id'=>$data['rating_id']]);
    	}
    }
}
