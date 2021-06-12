<?php

use Illuminate\Database\Seeder;
use App\ProductsImage;

class ProductsImageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ProductsImagesRecords =[
        	['id'=>1,'product_id'=>'3','image'=>'color.jpg-66982.jpg','status'=>1],
        ];

        ProductsImage::insert($ProductsImagesRecords);
    }
}
