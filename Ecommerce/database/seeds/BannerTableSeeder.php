<?php

use Illuminate\Database\Seeder;
use App\Banner;

class BannerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
                $BrandsRecords =[
        	['id'=>1,'image'=>'image1.png','link'=>'','title'=>'Black Jacket','alt'=>'black jacket','status'=>1],
        	['id'=>2,'image'=>'image2.png','link'=>'','title'=>'Black Jacket','alt'=>'black jacket','status'=>1],
        	['id'=>3,'image'=>'image3.png','link'=>'','title'=>'Black Jacket','alt'=>'black jacket','status'=>1],
        ];
        Banner::insert($BrandsRecords);
    }
}
