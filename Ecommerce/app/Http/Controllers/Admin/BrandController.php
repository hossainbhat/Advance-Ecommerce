<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use Session;
class BrandController extends Controller
{
    public function brands(){
    	Session::put('page','brands');

    	$brands = Brand::get();
    	return view('admin.brand.brands')->with(compact('brands'));
    }


    public function updateBrandStatus(Request $request){
    	if ($request->ajax()) {
    		$data = $request->all();
    		// echo "<pre>"; print_r($data); die;
    		if ($data['status']=="Active") {
    			$status = 0;
    		}else{
    			$status = 1;
    		}
    		Brand::where('id',$data['brand_id'])->update(['status'=>$status]);
    		return response()->json(['status'=>$status,'brand_id'=>$data['brand_id']]);
    	}
    }

    public function addEditBrand(Request $request, $id=null){
	        if ($id=="") {
	            $name ="Add Brand";
	            $brand = new Brand;
	            $branddata = array();
	            $message ="Brand Add Successfully!";
	        }else{
	            $name ="Edit Brand";
	            $branddata = Brand::where('id',$id)->first();
	            // $getCategories = json_decode(json_encode($getCategories),true);
	            // echo "<pre>"; print_r($getCategories); die;
	            $brand = Brand::find($id);
	            $message ="Brand Update Successfully!";
	        }
        if ($request->isMethod('post')) {
            $data = $request->all();
		// echo "<pre>"; print_r($data); die;
            $rulse = [
                'name' => 'required'
            ];

            $customMessage = [
                'name.required' =>'name is required'
            ];
            $this->validate($request,$rulse,$customMessage);
            
            $brand->name =$data['name'];
            $brand->status =1;
            $brand->save();

            Session::flash('success_message',$message);
            return redirect("admin/brands");
        }
        $brands = Brand::get();
        return view('admin.brand.add_edit_brand')->with(compact('name','brands','branddata'));
    }

    public function deleteBrand($id=null){

        Brand::where('id',$id)->delete();

        return redirect()->back()->with("success_message","Brand has been deleted Successfully!");
    }
}
