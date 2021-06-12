<?php

use Illuminate\Database\Seeder;
use App\Product;
class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ProductRecords =[
        	['id'=>1,'category_id'=>'1','section_id'=>'1','product_name'=>'Formal T-Shirt','product_code'=>'F0011f','product_color'=>'blue','product_price'=>'1000','product_discount'=>'10','product_weight'=>'200','product_video'=>'','main_image'=>'','description'=>'formal T-Shirt','wash_care'=>'','fabric'=>'','pattern'=>'','sleeve'=>'','fit'=>'','occasion'=>'','meta_title'=>'','meta_description'=>'','meta_keywords'=>'','is_featured'=>'No','status'=>1],
        	['id'=>2,'category_id'=>'2','section_id'=>'1','product_name'=>'Mean Casual T-Shirt','product_code'=>'C0011c','product_color'=>'black','product_price'=>'1000','product_discount'=>'10','product_weight'=>'200','product_video'=>'','main_image'=>'','description'=>'formal T-Shirt','wash_care'=>'','fabric'=>'','pattern'=>'','sleeve'=>'','fit'=>'','occasion'=>'','meta_title'=>'','meta_description'=>'','meta_keywords'=>'','is_featured'=>'Yes','status'=>1],
        ];

        Product::insert($ProductRecords);
    }
}
