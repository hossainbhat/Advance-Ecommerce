<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Rating;

class RatingController extends Controller
{
    public function Ratings(){
        $ratings = Rating::with(['user','product'])->orderBy('id','DESC')->get()->toArray();
        // dd($ratings);
        return view("admin.ratings.rating")->with(compact('ratings'));
       
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
