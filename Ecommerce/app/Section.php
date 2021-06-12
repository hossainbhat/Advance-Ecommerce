<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
	public static function sections(){
		$getSection = Section::with('categories')->where('status',1)->get();
		// $getSection = json_decode(json_encode(($getSection),true));
		// echo "<pre>"; print_r($getSection); die;
		return $getSection;
	}

    public function categories(){
    	return $this->hasMany('App\Category','section_id')->where(['parent_id'=>'Root','status'=>1])->with('subcategories');
    }
}
