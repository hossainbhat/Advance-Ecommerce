<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Section;
use App\Models\AdminsRole;
use Auth;
use Session;

class SectionController extends Controller
{
    public function sections(){
    	Session::put('page','sections');

    	$sections = Section::select('id','name','status')->get();

		$sectionModulCount = AdminsRole::where(['admin_id'=>Auth::guard('admin')->user()->id,'module'=>'category'])->count();
        if(Auth::guard('admin')->user()->type == "superadmin"){
            $sectionModul['view_access'] = 1;
            $sectionModul['edit_access'] = 1;
            $sectionModul['full_access'] = 1;
        }else if($sectionModulCount == 0){
            $message ="The Feature is restried for you !";
            Session::flash('error_message',$message);
            return redirect("admin/dashboard");
        }else{
            $sectionModul = AdminsRole::where(['admin_id'=>Auth::guard('admin')->user()->id,'module'=>'category'])->first()->toArray();

        }

    	return view('admin.section.sections')->with(compact('sections','sectionModul'));
    }
	public function updateSectionStatus(Request $request){
		
	
    	if ($request->ajax()) {
    		$data = $request->all();
    		// echo "<pre>"; print_r($data); die;
    		if ($data['status']=="Active") {
    			$status = 0;
    		}else{
    			$status = 1;
    		}
    		Section::where('id',$data['section_id'])->update(['status'=>$status]);
    		return response()->json(['status'=>$status,'section_id'=>$data['section_id']]);
    	}
    }
	public function addEditSection(Request $request, $id=null){
		$sectionModulCount = AdminsRole::where(['admin_id'=>Auth::guard('admin')->user()->id,'module'=>'category'])->count();
        if(Auth::guard('admin')->user()->type == "superadmin"){
            $sectionModul['view_access'] = 1;
            $sectionModul['edit_access'] = 1;
            $sectionModul['full_access'] = 1;
        }else if($sectionModulCount == 0){
            $message ="The Feature is restried for you !";
            Session::flash('error_message',$message);
            return redirect("admin/dashboard");
        }else{
            $sectionModul = AdminsRole::where(['admin_id'=>Auth::guard('admin')->user()->id,'module'=>'category'])->first()->toArray();

        }
		if ($id=="") {
				$name ="Add Section";
				$section = new Section;
				$sectiondata = array();
				$message ="Section Add Successfully!";
		}else{
				$name ="Edit Section";
				$sectiondata = Section::where('id',$id)->first();
				// $getCategories = json_decode(json_encode($getCategories),true);
				// echo "<pre>"; print_r($getCategories); die;
				$section = Section::find($id);
				$message ="Section Update Successfully!";
			}
		if ($request->isMethod('post')) {
			$data = $request->all();
		// echo "<pre>"; print_r($data); die;
			$rulse = [
				'name' => 'required',
			];

			$customMessage = [
				'name.required' =>'name is required'
			];
			$this->validate($request,$rulse,$customMessage);

			$section->name =$data['name'];
			$section->status =1;
			$section->save();

			Session::flash('success_message',$message);
			return redirect("admin/sections");
		}
		$sections = Section::get();
		return view('admin.section.add_edit_section')->with(compact('name','sections','sectiondata','sectionModul'));
	}

	public function deleteSection($id=null){

        Section::where('id',$id)->delete();
        return redirect()->back()->with("success_message","Section has been deleted Successfully!");
    }
	
}
