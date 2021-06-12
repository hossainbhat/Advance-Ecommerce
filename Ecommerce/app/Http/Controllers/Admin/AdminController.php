<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
// use Hash;
use Auth;
use Session;
use App\Admin;
use Image;

class AdminController extends Controller
{

    public function dashboard(){
        Session::put('page','dashboard');
    	return view('admin.dashboard');
    }

    public function settings(){
    Session::put('page','Admin-Password');
        // echo "<pre>"; print_r(Auth::guard('admin')->user());die;
        $adminDetails = Admin::where('email',Auth::guard('admin')->user()->email)->first();
        return view('admin.settings')->with(compact('adminDetails'));
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

    public function adminDetails(Request $request){
        Session::put('page','AdminDetails');
        if ($request->isMethod('post')) {
            $data = $request->all();

            $rulse = [
                'name' => 'required',
                'mobile' => 'required|numeric',
                'image' => 'image',
            ];

            $customMessage = [
                'name.required' =>'name is required',
                'mobile.required' =>'mobile is required',
                'mobile.numeric' =>'Valid mobile is required',
                'image.image' =>'Valid image is required',
            ];

            $this->validate($request,$rulse,$customMessage);

            if ($request->hasFile('image')) {
                $image_temp = $request->file('image');
                if ($image_temp->isValid()) {

                    $extention = $image_temp->getClientOriginalExtension();
                    $imageName = rand(111,99999).'.'.$extention;
                    $imagePath = 'images/admin_img/admin_photo/'.$imageName;
                    Image::make($image_temp)->resize(150,150)->save($imagePath);
                }else if (!empty($data['image'])){
                    $imageName = $data['image'];
                }else{
                    $imageName = "";
                }
            }

            Admin::where('email',Auth::guard('admin')->user()->email)->update(['name'=>$data['name'],'mobile'=>$data['mobile'],'image'=>$imageName]);
            Session::flash('success_message','Admin Details has been updated Successfully!');

            return redirect()->back();
        }
        return view('admin.admin_details');
    }
    public function login(Request $request){
    	if ($request->isMethod('post')) {
    		$data = $request->all();

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

    		if (Auth::guard('admin')->attempt(['email'=>$data['email'],'password'=>$data['password']])) {
    			return redirect('admin/dashboard');
    		}else{
    			Session::flash('error_message','Invalide Email or Password');
    			return redirect()->back();
    		}
    	}
    	// echo $password = Hash::make('123456');die;
    	return view('admin.login');
    }

    public function logout(){
      Session::put('page','logout');
    	Auth::guard('admin')->logout();
    	return redirect('/admin');
    }
}
