<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Section;
use Illuminate\Support\Facades\Session;

// use Session;

class SectionController extends Controller
{
    public function sections(){
    	Session::put('page','sections');

    	$sections = Section::select('id','name','status')->get();
    	return view('admin.section.sections')->with(compact('sections'));
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
		return view('admin.section.add_edit_section')->with(compact('name','sections','sectiondata'));
	}

	public function deleteSection($id=null){

        Section::where('id',$id)->delete();

        return redirect()->back()->with("success_message","Section has been deleted Successfully!");
    }
	
}
