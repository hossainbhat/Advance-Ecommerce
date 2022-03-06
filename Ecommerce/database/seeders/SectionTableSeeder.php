<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class SectionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sections')->delete();

        $sectionRecords =[
        	['id'=>1,'name'=>'Mean','status'=>1]
        ];

        DB::table('sections')->insert($sectionRecords);
    }
}
