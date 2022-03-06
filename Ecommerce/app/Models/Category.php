<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function subcategories(){
    	return $this->hasMany('App\Models\Category','parent_id')->where('status',1);
    }
    public function section(){
    	return $this->belongsTo('App\Models\Section','section_id')->select('id','name');
    }

    public function parentcategory(){
    	return $this->belongsTo('App\Models\Category','parent_id')->select('id','name');
    }
    
    public static function categoryDetails($url){
        $categoryDetails = Category::select('id','parent_id','name','url','description')->with(['subcategories'=> function($query){ $query->select('id','parent_id','name','url')->where('status',1); }])->where('url',$url)->first()->toArray();
        // dd($categoryDetails); die;
  
        if ($categoryDetails['parent_id'] ==0) {
          $breadcrumbs = '<a href="'.url($categoryDetails['url']).'">'.$categoryDetails['name'].'<a/>';
        }else{
          $parentCategory = Category::select('name','url')->where('id',$categoryDetails['parent_id'])->first()->toArray();
          $breadcrumbs = '<a href="'.url($categoryDetails['url']).'">'.$categoryDetails['name'].'<a/>&nbsp;<span class="divider">/</span>&nbsp;<a href="'.url($categoryDetails['url']).'">'.$categoryDetails['name'].'<a/>';
        }
        $catIds = Array();
        $catIds[] = $categoryDetails['id'];
        foreach ($categoryDetails['subcategories'] as $key => $subcat) {
          $catIds[] = $subcat['id'];
        }
        // dd($catIds); die;
        return array('catIds' => $catIds, 'categoryDetails' => $categoryDetails,'breadcrumbs' => $breadcrumbs);
      }
}
