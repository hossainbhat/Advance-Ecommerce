<?php

namespace App\Http\Controllers\Front;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CmsPage;

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
}
