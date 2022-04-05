<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CouponTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('coupons')->delete();

        $couponRecords =[
        	['id'=>1,'coupon_option'=>'Manual','coupon_code'=>'test10','categories'=>'1,2','users'=>'hossainbhat25@gmail.com','coupon_type'=>'single','amount_type'=>'percentage','amount'=>'10','expiry_date'=>'2022-05-06','status'=>1]
        ];

        DB::table('coupons')->insert($couponRecords);
    }
}
