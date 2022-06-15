<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Models\Admin;
use App\Models\User;
use App\Models\Product;
use App\Models\Order;
use App\Models\AdminsRole;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Image;


class AdminController extends Controller
{
    public function login(Request $request){
        //echo $password = Hash::make('123456');die;
    	if ($request->isMethod('post')) {
    		$data = $request->all();
            // echo "<pre>"; print_r($data); die;
    		$rulse = [
    			'email' => 'required|email|max:255',
		        'password' => 'required',
    		];

    		$customMessage = [
    			'email.required' =>'Email is required',
    			'email.email' =>'Valid Email is password',
    			'password.required' =>'password is required',
    		];

    		$this->validate($request,$rulse,$customMessage);

    		if (Auth::guard('admin')->attempt(['email'=>$data['email'],'password'=>$data['password'],'status'=>1])) {
    			return redirect('admin/dashboard');
    		}else{
    			Session::flash('error_message','Invalide Email or Password');
    			return redirect()->back();
    		}
    	}
        return view("admin.login");
    }

    public function dashboard(){
        $total_user = User::where('status',1)->count();
        $total_order = Order::where('order_status','New')->count();
        $total_complete_order = Order::where('order_status','Delivered')->count();
        $total_product = Product::where('status','1')->count();
        return view("admin.dashboard")->with(compact('total_product','total_user','total_order','total_complete_order'));
    }

	public function logout(){
		Auth::guard('admin')->logout();
    	return redirect('/admin');
	}

	public function profile(Request $request){
		if ($request->isMethod('post')) {
            $data = $request->all();
			// echo "<pre>"; print_r($data); die;
            $rulse = [
                'name' => 'required',
				'address' => 'required',
                'mobile' => 'required|numeric',
            ];

            $customMessage = [
                'name.required' =>'name is required',
				'address.required' =>'address is required',
                'mobile.required' =>'mobile is required',
                'mobile.numeric' =>'Valid mobile is required',
            ];

            $this->validate($request,$rulse,$customMessage);

            if ($request->hasFile('image')) {
                $image_temp = $request->file('image');
                if ($image_temp->isValid()) {

                    $extention = $image_temp->getClientOriginalExtension();
                    $imageName = rand(111,99999).'.'.$extention;
                    $imagePath = 'backEnd/images/profile/'.$imageName;
                    Image::make($image_temp)->resize(150,150)->save($imagePath);
                }else if (!empty($data['image'])){
                    $imageName = $data['image'];
                }else{
                    $imageName = "";
                }
            }

            Admin::where('email',Auth::guard('admin')->user()->email)->update(['name'=>$data['name'],'type'=>$data['type'],'mobile'=>$data['mobile'],'address'=>$data['address'],'image'=>$imageName]);
            Session::flash('success_message','Admin Details has been updated Successfully!');
            
            return redirect()->back();
        }
		return view("admin.profile.profile");
	}

    public function deleteProfileImage($id=null){

        $porfileImage = Admin::select('image')->where('id',$id)->first();

        $portfolio_image_path = "backEnd/images/profile/";
        if (file_exists($portfolio_image_path.$porfileImage->image)) {
            unlink($portfolio_image_path.$porfileImage->image);
        }

        Admin::where('id',$id)->update(['image'=>'']);

        return redirect()->back()->with("success_message","Portfolio Image has been deleted Successfully!");
    }

    public function chkPassword(Request $request){

        $data = $request->all();

        // echo "<pre>"; print_r($data);

        $current_password = $data['current_pwd'];
        // echo "<pre>"; print_r(Auth::guard('admin')->user()->password);die;
        // $check_password = Auth::guard('admin')User::where(['admin'=>'1'])->first();
        if(Hash::check($current_password,Auth::guard('admin')->user()->password)){
            echo "true"; die;
        }else {
            echo "false"; die;
        }
    }

    public function updatePassword(Request $request){
        if ($request->isMethod('post')) {
            $data = $request->all();

            if(Hash::check($data['current_pwd'],Auth::guard('admin')->user()->password)){

                if ($data['new_pwd']==$data['confirm_pwd']) {
                    Admin::where('id',Auth::guard('admin')->user()->id)->update(['password'=>bcrypt($data['new_pwd'])]);
                    Session::flash('success_message','Password has been updated Successfully!');
                }else{
                   Session::flash('error_message','new Password & confirm password not match!');
                }

            }else {

                Session::flash('error_message','Incorrect Current Password!');
            }
           return redirect()->back();
      }
    }


    public function Admins(){
        $roleModulCount = AdminsRole::where(['admin_id'=>Auth::guard('admin')->user()->id,'module'=>'category'])->count();
        if(Auth::guard('admin')->user()->type == "superadmin"){
            $roleModul['view_access'] = 1;
            $roleModul['edit_access'] = 1;
            $roleModul['full_access'] = 1;
        }else if($roleModulCount == 0){
            $message ="The Feature is restried for you !";
            Session::flash('error_message',$message);
            return redirect("admin/dashboard");
        }else{
            $roleModul = AdminsRole::where(['admin_id'=>Auth::guard('admin')->user()->id,'module'=>'category'])->first()->toArray();

        }
        $admins = Admin::select('id','name','email','mobile','status','type')->orderBy('id','DESC')->get();
        return view("admin.admin.admins")->with(compact('admins','roleModul'));
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
    		Admin::where('id',$data['admin_id'])->update(['status'=>$status]);
    		return response()->json(['status'=>$status,'admin_id'=>$data['admin_id']]);
    	}
    }

    public function AdminforgotPassword(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;
            $emailCount = Admin::where('email',$data['email'])->count();
            if($emailCount ==0){
                Session::put('error_message','Email does not exist!');
                Session::forget('success_message');
                return redirect()->back();
            }
            $random_password = str_random(8);
            $new_password = bcrypt($random_password);

            Admin::where('email',$data['email'])->update(['password'=>$new_password]);

            $userName= Admin::select('name')->where('email',$data['email'])->first();

            $email = $data['email'];
            $name = $userName->name;
            $messageData =[
                'email'=>$email,
                'name' =>$name,
                'password' => $random_password
            ];

            Mail::send('emails.admin_forgot_password',$messageData,function($message) use ($email){
                $message ->to($email)->subject('New Password E-Commerce Website for Admin');
            });
            $message ="please check your email for new password!";
            Session::put('success_message',$message);
           
            return redirect('/admin');
           
        }
        return view('admin.admin.adminForgotPassword');
    }

    public function deleteAdmin($id){

        Admin::where('id',$id)->delete();
        return redirect()->back()->with("success_message","Admin has been deleted Successfully!");
    }

    public function addEditAdmin(Request $request, $id=null){
        $roleModulCount = AdminsRole::where(['admin_id'=>Auth::guard('admin')->user()->id,'module'=>'category'])->count();
        if(Auth::guard('admin')->user()->type == "superadmin"){
            $roleModul['view_access'] = 1;
            $roleModul['edit_access'] = 1;
            $roleModul['full_access'] = 1;
        }else if($roleModulCount == 0){
            $message ="The Feature is restried for you !";
            Session::flash('error_message',$message);
            return redirect("admin/dashboard");
        }else{
            $roleModul = AdminsRole::where(['admin_id'=>Auth::guard('admin')->user()->id,'module'=>'category'])->first()->toArray();

        }

        if ($id=="") {
            $name ="Add Admin / Subadmin";
            $admin = new Admin;
            $admindata = array();
            $message ="Admin / Subadmin Add Successfully!";
        }else{
            $name ="Edit Admin / Subadmin";
            $admindata = Admin::where('id',$id)->first();

            $admin = Admin::find($id);
            $message ="Admin / Subadmin Update Successfully!";
        }
        if ($request->isMethod('post')) {
            $data = $request->all();


            if($id==""){
                $admincount = Admin::where('email',$data['email'])->count();
                if($admincount>0){
                    $message ="Admin / Subadmin is already exist!";
                    Session::flash('error_message',$message);
                    return redirect("admin/admins");
                }
            }
        // echo "<pre>"; print_r($data); die;
            $rulse = [
                'name' => 'required',
                'email' => 'required|email',
                'mobile' => 'required',
                'type' => 'required',
            ];

            $customMessage = [
                'name.required' =>'name is required',
                'email.required' =>'email is required',
                'email.required' =>'valid email is required',
                'unique.required' =>'unique email is required',
                'mobile.required' =>'mobile is required',
            ];

            $this->validate($request,$rulse,$customMessage);

            if ($request->hasFile('image')) {
                $image_temp = $request->file('image');
                if ($image_temp->isValid()) {

                    $extention = $image_temp->getClientOriginalExtension();
                    $imageName = rand(111,99999).'.'.$extention;
                    $imagePath = 'backend/images/profile/'.$imageName;
                    Image::make($image_temp)->save($imagePath);
                    $admin->image = $imageName;
               }
            }

            if (empty($data['alt'])) {
                $data['alt'] = "";
            }

            $admin->name = $data['name'];
            if($id==""){
                $admin->email = $data['email'];
                $admin->type = $data['type'];
            }
            $admin->mobile = $data['mobile'];
            if($data['password'] !=""){
                $admin->password = bcrypt($data['password']);
            }
            $admin->save();

            Session::flash('success_message',$message);
            return redirect("admin/admins");
        }
        $admins = Admin::get();
        return view('admin.admin.add_edit_admin')->with(compact('name','admins','admindata','roleModul'));
    }

    public function deleteAdminProfileImage($id){
        $porfileImage = Admin::select('image')->where('id',$id)->first();

        $portfolio_image_path = "backEnd/images/profile/";
        if (file_exists($portfolio_image_path.$porfileImage->image)) {
            unlink($portfolio_image_path.$porfileImage->image);
        }

        Admin::where('id',$id)->update(['image'=>'']);

        return redirect()->back()->with("success_message","Image has been deleted Successfully!");
    }

    public function updateRole(Request $request, $id){
        if($request->isMethod('post')){
            $data = $request->all();
            unset($data['_token']);
            // echo "<pre>"; print_r($data); die;
            AdminsRole::where('admin_id',$id)->delete();
            foreach($data as $key => $value){
                if(isset($value['view'])){
                    $view = $value['view'];
                }else{
                    $view = 0;
                }
                if(isset($value['edit'])){
                    $edit = $value['edit'];
                }else{
                    $edit = 0;
                }
                if(isset($value['full'])){
                    $full = $value['full'];
                }else{
                    $full = 0;
                }
                AdminsRole::where('admin_id',$id)->insert(['admin_id'=>$id,'module'=>$key,'view_access'=>$view,'edit_access'=>$edit,'full_access'=>$full]);

            }

            $message ="Admin Subadmin Role / Permission  Update Successfully!";
            Session::flash('success_message',$message);
            return redirect()->back();

        }
        $adminDetails = Admin::where('id',$id)->first()->toArray();
        $adminRoles = AdminsRole::where('admin_id',$id)->get()->toArray();
        $title = "Admin Subadmin (".$adminDetails['name'].") Role / Permission";
        return view("admin.admin.update_role")->with(compact('title','adminDetails','adminRoles'));
    }
   
}
