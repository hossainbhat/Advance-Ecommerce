<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CmsPage;
use App\Models\AdminsRole;
use Session;
use Auth;

class CmsController extends Controller
{
    public function cmsPages(){
        $cmsPages = CmsPage::where('status',1)->get()->toArray();
        $cmsModulCount = AdminsRole::where(['admin_id'=>Auth::guard('admin')->user()->id,'module'=>'category'])->count();
        if(Auth::guard('admin')->user()->type == "superadmin"){
            $cmsModul['view_access'] = 1;
            $cmsModul['edit_access'] = 1;
            $cmsModul['full_access'] = 1;
        }else if($cmsModulCount == 0){
            $message ="The Feature is restried for you !";
            Session::flash('error_message',$message);
            return redirect("admin/dashboard");
        }else{
            $cmsModul = AdminsRole::where(['admin_id'=>Auth::guard('admin')->user()->id,'module'=>'category'])->first()->toArray();

        }
        return view("admin.cms.cms_pages")->with(compact('cmsPages','cmsModul'));
    }
    public function updateCmsStatus(Request $request){
    	if ($request->ajax()) {
    		$data = $request->all();
    		// echo "<pre>"; print_r($data); die;
    		if ($data['status']=="Active") {
    			$status = 0;
    		}else{
    			$status = 1;
    		}
    		CmsPage::where('id',$data['cms_id'])->update(['status'=>$status]);
    		return response()->json(['status'=>$status,'cms_id'=>$data['cms_id']]);
    	}
    }

    public function addEditCms(Request $request, $id=null){
        $cmsModulCount = AdminsRole::where(['admin_id'=>Auth::guard('admin')->user()->id,'module'=>'category'])->count();
        if(Auth::guard('admin')->user()->type == "superadmin"){
            $cmsModul['view_access'] = 1;
            $cmsModul['edit_access'] = 1;
            $cmsModul['full_access'] = 1;
        }else if($cmsModulCount == 0){
            $message ="The Feature is restried for you !";
            Session::flash('error_message',$message);
            return redirect("admin/dashboard");
        }else{
            $cmsModul = AdminsRole::where(['admin_id'=>Auth::guard('admin')->user()->id,'module'=>'category'])->first()->toArray();

        }
        if ($id=="") {
            $name ="Add Cms";
            $cms = new CmsPage;
            $cmsdata = array();
            $message ="Cms Add Successfully!";
        }else{
            $name ="Edit Cms";
            $cmsdata = CmsPage::where('id',$id)->first();

            $cms = CmsPage::find($id);
            $message ="Cms Update Successfully!";
        }
        if ($request->isMethod('post')) {
            $data = $request->all();
// echo "<pre>"; print_r($data); die;
            $rulse = [
                'title' => 'required',
                'description' => 'required',
                'url' => 'required',
                'meta_title' => 'required',
                'meta_description' => 'required',
                'meta_keyword' => 'required',
            ];

            $customMessage = [
                'title.required' =>'title is required',
                'description.required' =>'description is required',
                'url.required' =>'url is required',
                'meta_title.required' =>'meta_title is required',
                'meta_description.required' =>'meta_description is required',
                'meta_keyword.required' =>'meta_keyword is required',
            ];

            $this->validate($request,$rulse,$customMessage);

            
            if (empty($data['meta_keyword'])) {
                $data['meta_keyword'] = "";
            }

            $cms->title = $data['title'];
            $cms->description = $data['description'];
            $cms->url = $data['url'];
            $cms->meta_title = $data['meta_title'];
            $cms->meta_description = $data['meta_description'];
            $cms->meta_keyword = $data['meta_keyword'];
            $cms->status =1;
            $cms->save();

            Session::flash('success_message',$message);
            return redirect("admin/cms-pages");
        }
        $cms_pages = CmsPage::get();
        return view('admin.cms.add_edit_cms')->with(compact('name','cms_pages','cmsdata','cmsModul'));
    }

    public function deleteCms($id=null){

        CmsPage::where('id',$id)->delete();

        return redirect()->back()->with("success_message","Cms has been deleted Successfully!");
    }
}
