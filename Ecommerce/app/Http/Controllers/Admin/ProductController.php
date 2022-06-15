<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductsAttribute;
use App\Models\Category;
use App\Models\Product;
use App\Models\Section;
use App\Models\Brand;
use App\Models\ProductsImage;
use App\Models\AdminsRole;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;
use Auth;

class ProductController extends Controller
{
    public function products(){
        Session::put('page','Products');
       $products = Product::with(['category'=>function($query){
           $query->select('id','name');
       },'section'=>function($query){
          $query->select('id','name');
       }])->get();

       $productModulCount = AdminsRole::where(['admin_id'=>Auth::guard('admin')->user()->id,'module'=>'category'])->count();
       if(Auth::guard('admin')->user()->type == "superadmin"){
           $productModul['view_access'] = 1;
           $productModul['edit_access'] = 1;
           $productModul['full_access'] = 1;
       }else if($productModulCount == 0){
           $message ="The Feature is restried for you !";
           Session::flash('error_message',$message);
           return redirect("admin/dashboard");
       }else{
           $productModul = AdminsRole::where(['admin_id'=>Auth::guard('admin')->user()->id,'module'=>'category'])->first()->toArray();

       }
       return view("admin.product.products")->with(compact("products","productModul"));
   }

        public function addEditProduct(Request $request, $id=null){

            $productModulCount = AdminsRole::where(['admin_id'=>Auth::guard('admin')->user()->id,'module'=>'category'])->count();
            if(Auth::guard('admin')->user()->type == "superadmin"){
                $productModul['view_access'] = 1;
                $productModul['edit_access'] = 1;
                $productModul['full_access'] = 1;
            }else if($productModulCount == 0){
                $message ="The Feature is restried for you !";
                Session::flash('error_message',$message);
                return redirect("admin/dashboard");
            }else{
                $productModul = AdminsRole::where(['admin_id'=>Auth::guard('admin')->user()->id,'module'=>'category'])->first()->toArray();
     
            }
            if($id=="") {
            $name ="Add Product";
            $product = new Product;
            $productdata = array();
            $message ="Product Add Successfully!";

        }else{
            $name ="Edit Product";
            $productdata =  Product::find($id);
            $product = Product::find($id);
            $message ="Product Edit Successfully!";
            // $productdata = json_decode(json_encode($productdata),true);
            // echo "<pre>"; print_r($productdata); die;
        }

        if ($request->isMethod('post')) {
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;
            $rulse = [
                'category_id' => 'required',
                'brand_id' => 'required',
                'product_name' => 'required|regex:/^[\pL\s-]+$/u',
                'product_code' => 'required|regex:/^[\w-]*$/',
                'product_price' => 'required|numeric',
                'product_color' => 'required|regex:/^[\pL\s-]+$/u',
            ];

            $customMessage = [
                'category_id.required' =>'category is required',
                'brand_id.required' =>'brand is required',
                'product_name.required' =>'Product name is required',
                'product_name.regex' =>'Valid Product name is required',
                'product_code.required' =>'Product code is required',
                'product_code.regex' =>'Valid Product code is required',
                'product_price.required' =>'Product price is required',
                'product_price.numeric' =>'Valid price is required',
                'product_color.required' =>'Product color is required',
                'product_color.regex' =>'Valid color is required',
            ];

            $this->validate($request,$rulse,$customMessage);


            if(empty($data['is_featured'])){
                $is_featured='No';
            }else{
                $is_featured='Yes';
            }

            if(empty($data['description'])){
                $description='';
            }
            if(empty($data['wash_care'])){
                $wash_care='';
            }
            if(empty($data['fabric'])){
                $fabric='';
            }
            if(empty($data['pattern'])){
                $pattern='';
            }
            if(empty($data['sleeve'])){
                $sleeve='';
            }
            if(empty($data['fit'])){
                $fit='';
            }
            if(empty($data['occasion'])){
                $occasion='';
            }
            if(empty($data['meta_title'])){
                $meta_title='';
            }
            if(empty($data['meta_description'])){
                $meta_description='';
            }
            if(empty($data['meta_keywords'])){
                $meta_keywords='';
            }
            if(empty($data['product_discount'])){
                $product_discount=0;
            }
            if(empty($data['product_weight'])){
                $product_weight=0;
            }



            //save product
            $categoryDetails = Category::find($data['category_id']);
                // echo "<pre>"; print_r($categoryDetails); die;
            //image upload
            if($request->hasFile('main_image')){
                $image_tmp = $request->file('main_image');
                if ($image_tmp->isValid()) {
                    // Upload Images after Resize
                    $image_name = $image_tmp->getClientOriginalName();
                    $extension = $image_tmp->getClientOriginalExtension();
                    $fileName = $image_name.'-'.rand(111,99999).'.'.$extension;
                    $large_image_path = 'backEnd/images/products/large'.'/'.$fileName;
                    $medium_image_path = 'backEnd/images/products/medium'.'/'.$fileName;
                    $small_image_path = 'backEnd/images/products/small'.'/'.$fileName;

                    Image::make($image_tmp)->save($large_image_path);//1000
                    Image::make($image_tmp)->resize(500, 500)->save($medium_image_path);
                    Image::make($image_tmp)->resize(200, 200)->save($small_image_path);

                    $product->main_image = $fileName;

                }
            }
            //video upload
            if($request->hasFile('product_video')){
                $video_tmp = $request->file('product_video');

                if ($video_tmp->isValid()) {

                $video_name = $video_tmp->getClientOriginalName();
                $extension = $video_tmp->getClientOriginalExtension();
                $videoName = $video_name.'-'.rand().'.'.$extension;
                $video_path = 'videos/';
                $video_tmp->move($video_path,$videoName);
                $product->product_video = $videoName;
                }
            }

            $product->section_id = $categoryDetails['section_id'];
            $product->brand_id = $data['brand_id'];
            $product->category_id = $data['category_id'];
            $product->product_name = $data['product_name'];
            $product->product_code = $data['product_code'];
            $product->product_color = $data['product_color'];
            $product->product_price = $data['product_price'];
            $product->product_discount = $data['product_discount'];
            $product->product_weight = $data['product_weight'];
            $product->description = $data['description'];
            $product->wash_care = $data['wash_care'];
            $product->fabric = $data['fabric'];
            $product->pattern = $data['pattern'];
            $product->sleeve = $data['sleeve'];
            $product->fit = $data['fit'];
            $product->occasion = $data['occasion'];
            $product->meta_title = $data['meta_title'];
            $product->meta_description = $data['meta_description'];
            $product->meta_keywords = $data['meta_keywords'];
            $product->is_featured = $is_featured;
            $product->status = 1;
            $product->save();

            Session::flash('success_message',$message);
            return redirect("admin/products");
        }


        //product Filter
        $productFilters = Product::productFilters();
        $fabricArray = $productFilters['fabricArray'];
        $sleeveArray = $productFilters['sleeveArray'];
        $patternArray = $productFilters['patternArray'];
        $fitArray = $productFilters['fitArray'];
        $occsionArray = $productFilters['occsionArray'];

        //show category
        $categories = Section::with('categories')->get();
        // $categories = json_decode(json_encode($categories),true);
        // echo "<pre>"; print_r($categories); die;
        //show brand
        $brands = Brand::where('status',1)->get();

        return view("admin.product.add_edit_product")->with(compact("productModul","name","fabricArray","sleeveArray","patternArray","fitArray","occsionArray","categories","productdata","brands"));
    }

    public function updateProductStatus(Request $request){
    	if ($request->ajax()) {
    		$data = $request->all();
    		// echo "<pre>"; print_r($data); die;
    		if ($data['status']=="Active") {
    			$status = 0;
    		}else{
    			$status = 1;
    		}
    		Product::where('id',$data['product_id'])->update(['status'=>$status]);
    		return response()->json(['status'=>$status,'product_id'=>$data['product_id']]);
    	}
    }

    public function deleteProductImage($id=null){
        $productImage = Product::select('main_image')->where('id',$id)->first();

        $large_image_path = "backEnd/images/products/large/";
        $medium_image_path = "backEnd/images/products/medium/";
        $small_image_path = "backEnd/images/products/small/";

        if (file_exists($large_image_path.$productImage->main_image)) {
            unlink($large_image_path.$productImage->main_image);
        }
        if (file_exists($medium_image_path.$productImage->main_image)) {
            unlink($medium_image_path.$productImage->main_image);
        }
        if (file_exists($small_image_path.$productImage->main_image)) {
            unlink($small_image_path.$productImage->main_image);
        }

        Product::where('id',$id)->update(['main_image'=>'']);

        return redirect()->back()->with("success_message","Product Image has been deleted Successfully!");

    }

    public function deleteProductVideo($id=null){
        $productVideo = Product::select('product_video')->where('id',$id)->first();

        $product_video_path = "backEnd/videos/";
        if (file_exists($product_video_path.$productVideo->product_video)) {
            unlink($product_video_path.$productVideo->product_video);
        }

        Product::where('id',$id)->update(['product_video'=>'']);

        return redirect()->back()->with("success_message","Product Video has been deleted Successfully!");
    }

    public function deleteProduct($id=null){
        //image path delete
        $productImage = Product::select('main_image')->where('id',$id)->first();

        if(!empty($productImage['main_image'])){
        $large_image_path = "backEnd/images/products/large/";
        $medium_image_path = "backEnd/images/products/medium/";
        $small_image_path = "backEnd/images/products/small/";

        if (file_exists($large_image_path.$productImage->main_image)) {
            unlink($large_image_path.$productImage->main_image);
        }
        if (file_exists($medium_image_path.$productImage->main_image)) {
            unlink($medium_image_path.$productImage->main_image);
        }
        if (file_exists($small_image_path.$productImage->main_image)) {
            unlink($small_image_path.$productImage->main_image);
        }
            Product::where('id',$id)->delete();
        }else{
            Product::where('id',$id)->delete();
        }
        //video path delete

        $productVideo = Product::select('product_video')->where('id',$id)->first();
        if(!empty($productVideo['product_video'])){
        $product_video_path = "backEnd/videos/";
        if (file_exists($product_video_path.$productVideo->product_video)) {
            unlink($product_video_path.$productVideo->product_video);
        }
             Product::where('id',$id)->delete();
        }else{
            Product::where('id',$id)->delete();
        }

        return redirect()->back()->with("success_message","Product has been deleted Successfully!");
    }

    //product attribute
    public function addEditProductAttribute(Request $request,$id){

        if ($request->isMethod('post')) {
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;

            foreach ($data['sku'] as $key => $value) {
                if(!empty($value)){

                    $attrCountSku = ProductsAttribute::where(['sku'=> $value])->count();
                    if($attrCountSku > 0){
                        return redirect()->back()->with('error_message','SKU already exits. please add another sku');
                    }

                    $attrCountSize = ProductsAttribute::where(["product_id"=>$id,'size'=> $data['size'][$key]])->count();
                    if($attrCountSize > 0){
                        return redirect()->back()->with('error_message','Size already exits. please add another Size');
                    }

                    $attribute = new  ProductsAttribute;
                    $attribute->product_id = $id;
                    $attribute->sku = $value;
                    $attribute->size = $data['size'][$key];
                    $attribute->price = $data['price'][$key];
                    $attribute->stock = $data['stock'][$key];
                    $attribute->status =1;
                    $attribute->save();
                }
            }

            return redirect()->back()->with('success_message','Product Attribute added has ben Successfully!');
        }
        $product = Product::select('id','product_name','product_code','product_price','product_color','main_image')->with('attributes')->find($id);
        // $product = json_decode(json_encode($product,true));
        //  echo "<pre>"; print_r($product); die;
        $name = "Product Attribute";
        return view('admin.product.add_edit_product_attribute')->with(compact('product','name'));
    }

    public function editAttributes(Request $request,$id){
        if ($request->isMethod('post')) {
            $data = $request->all();
             // echo "<pre>"; print_r($data); die;
            foreach ($data['attrId'] as $key => $attr) {
                if (!empty($attr)) {
                    ProductsAttribute::where(['id'=>$data['attrId'][$key]])->update(['price'=>$data['price'][$key],'stock'=>$data['stock'][$key]]);
                }
            }
                $message = "Attributes update has been Successfully";
                Session::flash('success_message',$message);
                return redirect()->back();
        }
    }
    public function updateAttributeStatus(Request $request){
        if ($request->ajax()) {
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;
            if ($data['status']=="Active") {
                $status = 0;
            }else{
                $status = 1;
            }
            ProductsAttribute::where('id',$data['attribute_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status,'attribute_id'=>$data['attribute_id']]);
        }
    }

    public function deleteAttribute($id=null){
         ProductsAttribute::where('id',$id)->delete();

        return redirect()->back()->with("success_message","Attribute has been deleted Successfully!");
    }

    public function addEditProductImage(Request $request,$id=null){
        // dd($request->all());
        if ($request->isMethod('post')) {
            if ($request->hasFile('images')) {
                $images = $request->file('images');
                foreach ($images as $key => $image) {
                    $productImage = new ProductsImage;
                    $image_tmp = Image::make($image);
                    $extension = $image->getClientOriginalExtension();
                    $fileName = rand(111,99999).time().".".$extension;

                    $large_image_path = 'backEnd/images/products/large'.'/'.$fileName;
                    $medium_image_path = 'backEnd/images/products/medium'.'/'.$fileName;
                    $small_image_path = 'backEnd/images/products/small'.'/'.$fileName;

                    Image::make($image_tmp)->save($large_image_path);
                    Image::make($image_tmp)->resize(500, 500)->save($medium_image_path);
                    Image::make($image_tmp)->resize(200, 200)->save($small_image_path);

                    $productImage->image = $fileName;
                    $productImage->product_id = $id;
                    $productImage->status = 1;
                    $productImage->save();
                }
                return redirect()->back()->with("success_message","Image has been added Successfully!");

            }
        }
        $product = Product::select('id','product_name','product_code','product_color','main_image')->with('ProductImage')->find($id);
        // $productdata = json_decode(json_encode($product,true));
        //  echo "<pre>"; print_r($productdata); die;
        $name ="Product Image";
        return view('admin.product.add_edit_product_image')->with(compact('product','name'));
    }

    public function deleteproductImages($id){
        $productImage = ProductsImage::select('image')->where('id',$id)->first();
        // $productImage = json_decode(json_encode($productImage,true));
        // echo "<pre>"; print_r($productImage); die;
        $large_image_path = "backEnd/images/products/large/";
        $medium_image_path = "backEnd/images/products/medium/";
        $small_image_path = "backEnd/images/products/small/";

        if (file_exists($large_image_path.$productImage->image)) {
            unlink($large_image_path.$productImage->image);
        }
        if (file_exists($medium_image_path.$productImage->image)) {
            unlink($medium_image_path.$productImage->image);
        }
        if (file_exists($small_image_path.$productImage->image)) {
            unlink($small_image_path.$productImage->image);
        }

        ProductsImage::where('id',$id)->delete();

        return redirect()->back()->with("success_message","Product Image has been deleted Successfully!");
    }

    public function updateImageStatus(Request $request){
        if ($request->ajax()) {
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;
            if ($data['status']=="Active") {
                $status = 0;
            }else{
                $status = 1;
            }
            ProductsImage::where('id',$data['image_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status,'image_id'=>$data['image_id']]);
        }
    }
    
}
