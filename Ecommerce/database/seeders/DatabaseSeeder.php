<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        // $this->call(AdminTableSeeder::class);
        // $this->call(SectionTableSeeder::class);
        //  $this->call(BrandTableSeeder::class);
        //  $this->call(CouponTableSeeder::class);
         $this->call(DeliveryAddressTableSeeder::class);
        
        
    }
}
