<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class CmsPageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cmsPageRecords =[
        	['id'=>1,'title'=>'Trams & Condition','description'=>'this is trams and condition','url'=>'trams_and_contion','meta_title'=>'trams and condition','meta_description'=>'meta description','meta_keyword'=>'trams_and_contion','status'=>1]
        ];

        DB::table('cms_pages')->insert($cmsPageRecords);
    }
}
