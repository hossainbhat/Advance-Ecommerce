<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\AdminsRole;
use Session;
use Auth;
use Carbon\Carbon;

class UserController extends Controller
{
    public function Users(){
        $users = User::select('id','name','email','mobile','city','country','status')->orderBy('id','DESC')->get();
		$userModulCount = AdminsRole::where(['admin_id'=>Auth::guard('admin')->user()->id,'module'=>'category'])->count();
        if(Auth::guard('admin')->user()->type == "superadmin"){
            $userModul['view_access'] = 1;
            $userModul['full_access'] = 1;
        }else if($userModulCount == 0){
            $message ="The Feature is restried for you !";
            Session::flash('error_message',$message);
            return redirect("admin/dashboard");
        }else{
            $userModul = AdminsRole::where(['admin_id'=>Auth::guard('admin')->user()->id,'module'=>'category'])->first()->toArray();

        }
        return view("admin.user.users")->with(compact('users','userModul'));
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


    public function viewUserChart(){
        $current_menth_users = User::whereYear('created_at',Carbon::now()->year)->whereMonth('created_at',Carbon::now()->month)->count();
        $before_1_month_users = User::whereYear('created_at',Carbon::now()->year)->whereMonth('created_at',Carbon::now()->subMonth(1))->count();
        $before_2_month_users = User::whereYear('created_at',Carbon::now()->year)->whereMonth('created_at',Carbon::now()->subMonth(2))->count();
        $before_3_month_users = User::whereYear('created_at',Carbon::now()->year)->whereMonth('created_at',Carbon::now()->subMonth(3))->count();
        $userCount = array($current_menth_users,$before_1_month_users,$before_2_month_users,$before_3_month_users);
        return view("admin.user.view_users_chart")->with(compact('userCount'));
    }


}
