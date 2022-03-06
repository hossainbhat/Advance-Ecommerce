<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Section;
use Session;
use Image;

class CategoryController extends Controller
{
    public function categories(){
        Session::put('page','Categories');
    	$categories = Category::with(['section','parentcategory'])->get();
            // $categories = json_decode(json_encode($categories),true);
            // echo "<pre>"; print_r($categories); die;
    	return view('admin.category.categories')->with(compact('categories'));
    }

    
    public function addEditCategory(Request $request, $id=null){
        if ($id=="") {
            $name ="Add Category";
            $category = new Category;
            $categorydata = array();
            $getCategories = array();
            $message ="Category Add Successfully!";
        }else{
            $name ="Edit Category";
            $categorydata = Category::where('id',$id)->first();
            $getCategories = Category::with('subcategories')->where(['parent_id'=>0, 'section_id'=>$categorydata['section_id']])->get();
            // $getCategories = json_decode(json_encode($getCategories),true);
            // echo "<pre>"; print_r($getCategories); die;
            $category = Category::find($id);
            $message ="Category Update Successfully!";
        }
        if ($request->isMethod('post')) {
            $data = $request->all();
// echo "<pre>"; print_r($data); die;
            $rulse = [
                'name' => 'required',
                'section_id' => 'required',
                'url' => 'required',
                'image' => 'image',
            ];

            $customMessage = [
                'name.required' =>'name is required',
                'section_id.required' =>'section name is required',
                'url.required' =>'url is required',
                'image.image' =>'Valid image is required',
            ];

            $this->validate($request,$rulse,$customMessage);

            if ($request->hasFile('image')) {
                $image_temp = $request->file('image');
                if ($image_temp->isValid()) {

                    $extention = $image_temp->getClientOriginalExtension();
                    $imageName = rand(111,99999).'.'.$extention;
                    $imagePath = 'backEnd/images/category_image/'.$imageName;
                    Image::make($image_temp)->save($imagePath);
                    $category->image = $imageName;
               }
            }

            if (empty($data['description'])) {
                $data['description'] = "";
            }if (empty($data['meta_title'])) {
                $data['meta_title'] = "";
            }if (empty($data['meta_description'])) {
                $data['meta_description'] = "";
            }if (empty($data['meta_keywords'])) {
                $data['meta_keywords'] = "";
            }

            $category->parent_id = $data['parent_id'];
            $category->section_id = $data['section_id'];
            $category->name = $data['name'];
            $category->discount = $data['discount'];
            $category->description = $data['description'];
            $category->url = $data['url'];
            $category->meta_title = $data['meta_title'];
            $category->meta_description = $data['meta_description'];
            $category->meta_keywords = $data['meta_keywords'];
            $category->status =1;
            $category->save();

            Session::flash('success_message',$message);
            return redirect("admin/categories");
        }
        $sections = Section::get();
        return view('admin.category.add_edit_category')->with(compact('name','sections','categorydata','getCategories'));
    }

    public function appendCategoriesLevel(Request $request){
        if ($request->ajax()) {
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;
            $getCategories = Category::with('subcategories')->where(['section_id'=>$data['section_id'],'parent_id'=>0,'status'=>1])->get();
            $getCategories = json_decode(json_encode($getCategories),true);
            // echo "<pre>"; print_r($getCategories); die;
            return view('admin.category.append_categories')->with(compact('getCategories'));
        }
    }

    public function updateCategoryStatus(Request $request){
    	if ($request->ajax()) {
    		$data = $request->all();
    		// echo "<pre>"; print_r($data); die;
    		if ($data['status']=="Active") {
    			$status = 0;
    		}else{
    			$status = 1;
    		}
    		Category::where('id',$data['category_id'])->update(['status'=>$status]);
    		return response()->json(['status'=>$status,'category_id'=>$data['category_id']]);
    	}
    }
    public function deleteCategoryImage($id=null){
        $categoryImage = Category::select('image')->where('id',$id)->first();

        $category_image_path = "backEnd/images/category_image/";
        if (file_exists($category_image_path.$categoryImage->image)) {
            unlink($category_image_path.$categoryImage->image);
        }

        Category::where('id',$id)->update(['image'=>'']);

        return redirect()->back()->with("success_message","Category Image has been deleted Successfully!");
    }
    public function deleteCategory($id=null){
        $categoryImage = Category::select('image')->where('id',$id)->first();

        if(!empty($categoryImage['image'])){
        $category_image_path = "backEnd/images/category_image/";
        if (file_exists($category_image_path.$categoryImage->image)) {
            unlink($category_image_path.$categoryImage->image);
        }
         Category::where('id',$id)->delete();
        }else{
            Category::where('id',$id)->delete();
        }

        return redirect()->back()->with("success_message","Category has been deleted Successfully!");
    }

}
