<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class DeliveryAddressTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $DeliveryAddressRecords =[
        	['id'=>1,'user_id'=>6,'name'=>'roja','address'=>'test1','mobile'=>'04238480204','city'=>'dhaka','state'=>'1','country'=>'Bnagladesh','pincode'=>'75446','status'=>1],
        	['id'=>2,'user_id'=>6,'name'=>'roja','address'=>'test2','mobile'=>'04236573204','city'=>'dhaka','state'=>'1','country'=>'Bnagladesh','pincode'=>'4535','status'=>1]
        ];

        DB::table('delivery_addresses')->insert($DeliveryAddressRecords);
    }
}
