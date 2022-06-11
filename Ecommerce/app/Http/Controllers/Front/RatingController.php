<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Rating;
use Auth;
use Session;
class RatingController extends Controller
{
    public function addRating(Request $request){
        if($request->isMethod("post")){
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;
            if(!Auth::check()){
                $message ="Login to ret tis product!";
                Session::flash('error_message',$message);
                return redirect()->back();
            }

            if(!isset($data['rating'])){
                $message ="Add at lest one star rating for this product";
                Session::flash('error_message',$message);
                return redirect()->back();
            }
            $ratingCount = Rating::where(['user_id'=>Auth::user()->id,'product_id'=>$data['product_id']])->count();
            if($ratingCount>0){
                $message ="Your rating already exist for this product";
                Session::flash('error_message',$message);
                return redirect()->back();
            }else{
                $rating = new Rating;
                $rating->user_id = Auth::user()->id;
                $rating->product_id = $data['product_id'];
                $rating->review = $data['review'];
                $rating->rating = $data['rating'];
                $rating->status =0;
                $rating->save();
                $message ="Thanks for rating this product. It will be show once approve";
                Session::flash('success_message',$message);
                return redirect()->back();
            }
        }
    } 
}
