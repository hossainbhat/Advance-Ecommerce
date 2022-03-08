<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
// use Image;
use Intervention\Image\Facades\Image;

class AdminController extends Controller
{
    public function login(Request $request){
        //echo $password = Hash::make('123456');die;
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
        return view("admin.dashboard");
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

   
}
