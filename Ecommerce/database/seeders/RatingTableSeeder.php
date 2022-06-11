<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class RatingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ratingRecords =[
        	['id'=>1,'user_id'=>6,'product_id'=>10,'review'=>'good product','rating'=>3,'status'=>1],
        	['id'=>2,'user_id'=>6,'product_id'=>7,'review'=>'very bad product','rating'=>1,'status'=>1],
        	['id'=>3,'user_id'=>6,'product_id'=>10,'review'=>'very good product','rating'=>5,'status'=>1]
        ];

        DB::table('ratings')->insert($ratingRecords);
    }
}
