<?php

use Illuminate\Database\Seeder;
use App\Brand;
class BrandTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $BrandsRecords =[
        	['id'=>1,'name'=>'Flow','status'=>1],
        	['id'=>2,'name'=>'Marbel','status'=>1],
        	['id'=>3,'name'=>'whoo','status'=>1],
        ];
        Brand::insert($BrandsRecords);
    }
}
