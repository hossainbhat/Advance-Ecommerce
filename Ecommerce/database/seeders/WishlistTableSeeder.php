<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class WishlistTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $wishlistRecords =[
        	['id'=>1,'user_id'=>6,'product_id'=>4],
        	['id'=>2,'user_id'=>6,'product_id'=>5],
        ];

        DB::table('wishlists')->insert($wishlistRecords);
    }
}
