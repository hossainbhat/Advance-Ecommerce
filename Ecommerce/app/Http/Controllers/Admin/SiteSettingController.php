<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\S;

class SiteSettingController extends Controller
{
    public function SiteSettings(){
        
        return view("admin.sitesettings.sitesetting");
    }
}
