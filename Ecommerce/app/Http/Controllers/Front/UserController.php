<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use App\Models\Country;
use App\Models\User;
use App\Models\Cart;
use App\Models\Sms;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function LoginRegister(){
        return view("front.user.login_register");
    }

    public function loginUser(Request $request){
        if($request->isMethod('post')){
            Session::forget('error_message');
            Session::forget('success_message');
            $data = $request->all();
            // echo "<pre>"; print_r($data);die;
            if(Auth::attempt(['email'=>$data['email'],'password'=>$data['password']])){

                $userStatus = User::where('email',$data['email'])->first();
                if($userStatus->status == 0){
                    Auth::logout();
                    $message ="your account is not activated yet! please confirm your email to activate!";
                    Session::put('error_message',$message);
                    return redirect()->back();
                }
                if(!empty(Session::get('session_id'))){
                    $user_id = Auth::user()->id;
                    $session_id = Session::get('session_id');
                    Cart::where('session_id',$session_id)->update(['user_id'=>$user_id]);
                }
                return redirect('/cart');
            }else{
                $message ="Invalid User or password";
                Session::flash('error_message',$message);
                return redirect()->back();
            }
        }
    }
    public function registerUser(Request $request){
        if($request->isMethod('post')){
            Session::forget('error_message');
            Session::forget('success_message');
            $data = $request->all();
            // echo "<pre>"; print_r($data);die;
            $userCount = User::where('email',$data['email'])->count();
            if($userCount>0){
                $message ="Email is already Exists";
                Session::flash('error_message',$message);
                return redirect()->back();
            }else{
                $user = new User;
                $user->name = $data['name'];
                $user->email = $data['email'];
                $user->mobile = $data['mobile'];
                $user->password = bcrypt($data['password']);
                $user->status = 0;
                $user->save();


                $email = $data['email'];
                $messageData = [
                    'email'=>$data['email'],
                    'name'=>$data['name'],
                    'code'=>base64_encode($data['email'])
                ];

                Mail::send('emails.confirmation',$messageData,function($message) use ($email){
                    $message->to($email)->subject('confirm your E-commerce Account');
                });

                $message = "please confirm your email to active account!";
                Session::put('success_message',$message);
                return redirect()->back();
            }

        }
    }

    public function checkEmail(Request $request){
        $data = $request->all();
        $emailCount = User::where('email',$data['email'])->count();
        if($emailCount>0){
           return "false";
        }else{
            return "true"; 
        }
    }


    public function confirmAccount($email){
        $email = base64_decode($email);
        Session::forget('error_message');
        Session::forget('success_message');
        //email exist
        $userCount = User::where('email',$email)->count();
        if($userCount >0){
            //check email active or not 
            $userDetails = User::where('email',$email)->first();
            if($userDetails->status == 1){
                $message = "your email account is already active. plese login";
                Session::put('error_message',$message);
                return redirect('login-register');
            }else{
                //update status
               User::where('email',$email)->update(['status'=>1]);

                    
                    //send sms
                    // $message ="Dear Customer, You have been successfully registred with E-Commerce Website. login to your account access order and avalable offers ";
                    // $mobile= $userDetails['mobile'];
                    // Sms::sendSms($message,$mobile);

                    $messageData = ['name'=>$userDetails['name'],'mobile'=>$userDetails['mobile'],'email'=>$email];
                    Mail::send('emails.register',$messageData,function($message) use($email){
                        $message->to($email)->subject('wellcome to E-commerce website');
                    });

                    $message ="Your email account is activated. you can login now!";
                    Session::put('success_message',$message);
                    return redirect('login-register');
            }
        }else{
            abort(404);
        }
    }

    public function logoutUser(){
        Auth::logout();
        return redirect('/');
    }

    public function UserforgotPassword(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;
            $emailCount = User::where('email',$data['email'])->count();
            if($emailCount ==0){
                Session::put('error_message','Email does not exist!');
                Session::forget('success_message');
                return redirect()->back();
            }
            $random_password = str_random(8);
            $new_password = bcrypt($random_password);

            User::where('email',$data['email'])->update(['password'=>$new_password]);

            $userName= User::select('name')->where('email',$data['email'])->first();

            $email = $data['email'];
            $name = $userName->name;
            $messageData =[
                'email'=>$email,
                'name' =>$name,
                'password' => $random_password
            ];

            Mail::send('emails.forgot_password',$messageData,function($message) use ($email){
                $message ->to($email)->subject('New Password E-Commerce Website');
            });
            $message ="please check your email for new password!";
            Session::put('success_message',$message);
           
            return redirect('login-register');
           
        }
        return view('front.user.userForgotPassword');
    }

  
    public function Account(Request $request){
        Session::forget('success_message');
        Session::forget('error_message');
        $user_id = Auth::user()->id;
        $userDetails = User::find($user_id)->toArray();
        $countries = Country::where('status',1)->get();
       
        if($request->isMethod('post')){
          
          
            $data = $request->all();
            
            $rulse = [
                'name' => 'required|regex:/^[\pL\s\-]+$/u',
                'mobile' => 'required|numeric',
            ];

            $customMessage = [
                'name.required' =>'name is required',
                'mobile.required' =>'mobile is required',
                'mobile.numeric' =>'Valid mobile is required',
            ];

            $this->validate($request,$rulse,$customMessage);

            $user = User::find($user_id);
            $user->name = $data['name'];
            $user->address = $data['address'];
            $user->city = $data['city'];
            $user->state = $data['state'];
            $user->country = $data['country'];
            $user->pincode = $data['pincode'];
            $user->mobile = $data['mobile'];
            $user->save();
          
            $message ="your account has been updated successfully";
            
           
            Session::put('success_message',$message);
            
           
            return redirect()->back();
        }
       
        return view('front.user.user_account')->with(compact('userDetails','countries'));
    }

    public function checkUserPassword(Request $request){
        $data = $request->all();

        // echo "<pre>"; print_r($data);

        $current_password = $data['current_pwd'];
        // echo "<pre>"; print_r(Auth::user()->password);die;
        // $check_password = Auth::guard('admin')User::where(['admin'=>'1'])->first();
        if(Hash::check($current_password,Auth::user()->password)){
            echo "true"; die;
        }else {
            echo "false"; die;
        }
    }

    public function updateUserPassword(Request $request){
        if ($request->isMethod('post')) {
            $data = $request->all();

            if(Hash::check($data['current_pwd'],Auth::user()->password)){

                if ($data['new_pwd']==$data['confirm_pwd']) {
                    User::where('id',Auth::user()->id)->update(['password'=>bcrypt($data['new_pwd'])]);
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
