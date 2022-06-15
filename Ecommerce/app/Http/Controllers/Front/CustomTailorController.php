<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomTailorController extends Controller
{
    public function customTailors(){
        return view("front.customtailor.custom_tailor");
    }
}
