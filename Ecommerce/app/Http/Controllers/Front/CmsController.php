<?php

namespace App\Http\Controllers\Front;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CmsPage;
use Illuminate\Support\Facades\Mail;
use Session;

class CmsController extends Controller
{
    public function cmspage(){
        $currentRoute = url()->current();
        $currentRoute = str_replace('http://localhost:8000/','',$currentRoute);
        $cmsRoute = CmsPage::where('status',1)->get()->pluck('url')->toArray();
        // dd($cmsRoute);die;
        if(in_array($currentRoute,$cmsRoute)){
            $cmsPageDetails = CmsPage::where('url',$currentRoute)->first()->toArray();
            return view("front.pages.cms_page")->with(compact('cmsPageDetails'));
        }else{
            abort(404);
        }
    }

    public function contact(Request $request){
       if($request->isMethod("post")){
        $data = $request->all();
        
        $rulse = [
            'name' => 'required|regex:/^[\pL\s-]+$/u',
            'email' => 'required|email',
            'subject' => 'required|regex:/^[\pL\s-]+$/u',
            'message' => 'required',
        ];

        $customMessage = [
            'name.required' =>'name is required',
            'regex.required' =>'valid name is required',
            'email.required' =>'email is required',
            'email.required' =>'valid email is required',
            'subject.required' =>'subject is required',
            'regex.required' =>'valid subject is required',
            'message.required' =>'message is required',
        ];

        $this->validate($request,$rulse,$customMessage);



        $email = "admin001@yopmail.com";

        $messageData = [
            'name'=>$data['name'],
            'email'=>$data['email'],
            'subject'=>$data['subject'],
            'comment'=>$data['message']
        ];
        Mail::send('emails.contact',$messageData,function($message) use($email){
            $message->to($email)->subject('Enquiry from E-commerce website');
        });

        $message ="Thanks for your enquery. we will get back to you soon!";
        Session::put('success_message',$message);
        return redirect()->back();
       }

        return view("front.pages.contact");
    }
}
