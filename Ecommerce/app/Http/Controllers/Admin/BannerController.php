<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use Session;
use Image;
class BannerController extends Controller
{
    public function banners(){
    	Session::put('page','banners');
    	$banners = Banner::get();
    	// dd($banners); die;
    	return view('admin.banner.banners')->with(compact('banners'));
    }

    public function addEditBanner(Request $request, $id=null){
        if ($id=="") {
            $name ="Add Banner";
            $banner = new Banner;
            $bannerdata = array();
            $message ="Banner Add Successfully!";
        }else{
            $name ="Edit Banner";
            $bannerdata = Banner::where('id',$id)->first();

            $banner = Banner::find($id);
            $message ="Banner Update Successfully!";
        }
        if ($request->isMethod('post')) {
            $data = $request->all();
// echo "<pre>"; print_r($data); die;
            $rulse = [
                'link' => 'required',
                'title' => 'required',
            ];

            $customMessage = [
                'link.required' =>'link is required',
                'title.required' =>'title is required',
            ];

            $this->validate($request,$rulse,$customMessage);

            if ($request->hasFile('image')) {
                $image_temp = $request->file('image');
                if ($image_temp->isValid()) {

                    $extention = $image_temp->getClientOriginalExtension();
                    $imageName = rand(111,99999).'.'.$extention;
                    $imagePath = 'backend/images/banners/'.$imageName;
                    Image::make($image_temp)->save($imagePath);
                    $banner->image = $imageName;
               }
            }

            if (empty($data['alt'])) {
                $data['alt'] = "";
            }

            $banner->link = $data['link'];
            $banner->title = $data['title'];
            $banner->alt = $data['alt'];
            $banner->status =1;
            $banner->save();

            Session::flash('success_message',$message);
            return redirect("admin/banners");
        }
        $banners = Banner::get();
        return view('admin.banner.add_edit_banner')->with(compact('name','banners','bannerdata'));
    }

    public function updateBannerStatus(Request $request){
    	if ($request->ajax()) {
    		$data = $request->all();
    		// echo "<pre>"; print_r($data); die;
    		if ($data['status']=="Active") {
    			$status = 0;
    		}else{
    			$status = 1;
    		}
    		Banner::where('id',$data['banner_id'])->update(['status'=>$status]);
    		return response()->json(['status'=>$status,'banner_id'=>$data['banner_id']]);
    	}
    }
    public function deleteBanner($id=null){
        $bannerImage = Banner::select('image')->where('id',$id)->first();

        $banner_image_path = "backEnd/images/banners/";
        if (file_exists($banner_image_path.$bannerImage->image)) {
            unlink($banner_image_path.$bannerImage->image);
        }

        Banner::where('id',$id)->delete();

        return redirect()->back()->with("success_message","Banner has been deleted Successfully!");
    }

    public function deleteBannerImages($id=null){
        $bannerImage = Banner::select('image')->where('id',$id)->first();

        $banner_image_path = "backEnd/images/banners/";
        if (file_exists($banner_image_path.$bannerImage->image)) {
            unlink($banner_image_path.$bannerImage->image);
        }

        Banner::where('id',$id)->update(['image'=>'']);

        return redirect()->back()->with("success_message","Banner Image has been deleted Successfully!");
    }
}
