<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class BrandTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('brands')->delete();

        $sectionRecords =[
        	['id'=>1,'name'=>'Dorjibari','status'=>1]
        ];

        DB::table('brands')->insert($sectionRecords);
    }
}
