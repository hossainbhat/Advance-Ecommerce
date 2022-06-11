<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Admin;

class UserController extends Controller
{
    public function Users(){
        $users = User::select('id','name','email','mobile','city','country','status')->orderBy('id','DESC')->get();
        return view("admin.user.users")->with(compact('users'));
    }
	public function Admins(){
        $admins = Admin::select('id','name','email','mobile','status','type')->orderBy('id','DESC')->get();
        return view("admin.user.admins")->with(compact('admins'));
    }

    public function updateAdminStatus(Request $request){
    	if ($request->ajax()) {
    		$data = $request->all();
    		// echo "<pre>"; print_r($data); die;
    		if ($data['status']=="Active") {
    			$status = 0;
    		}else{
    			$status = 1;
    		}
    		User::where('id',$data['admin_id'])->update(['status'=>$status]);
    		return response()->json(['status'=>$status,'admin_id'=>$data['admin_id']]);
    	}
    }
	public function updateUserStatus(Request $request){
    	if ($request->ajax()) {
    		$data = $request->all();
    		// echo "<pre>"; print_r($data); die;
    		if ($data['status']=="Active") {
    			$status = 0;
    		}else{
    			$status = 1;
    		}
    		User::where('id',$data['user_id'])->update(['status'=>$status]);
    		return response()->json(['status'=>$status,'user_id'=>$data['user_id']]);
    	}
    }

}
