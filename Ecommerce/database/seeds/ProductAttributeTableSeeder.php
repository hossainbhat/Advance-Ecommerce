<?php

use Illuminate\Database\Seeder;
use App\ProductsAttribute;

class ProductAttributeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ProductsAttributeRecords =[
        	['id'=>1,'product_id'=>'3','size'=>'small','price'=>'300','stock'=>'20','sku'=>'ORG200-S','status'=>1],
        	['id'=>2,'product_id'=>'3','size'=>'medium','price'=>'320','stock'=>'15','sku'=>'ORG200-M','status'=>1],
        	['id'=>3,'product_id'=>'3','size'=>'large','price'=>'350','stock'=>'10','sku'=>'ORG200-L','status'=>1],
        ];

        ProductsAttribute::insert($ProductsAttributeRecords);
    }
}
