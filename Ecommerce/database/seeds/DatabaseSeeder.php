<?php

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
    	// $this->call(AdminTableSeeder::class);
        // $this->call(UserSeeder::class);
        // $this->call(SectionTableSeeder::class);
        // $this->call(CategoryTableSeeder::class);
        // $this->call(ProductTableSeeder::class);
        // $this->call(ProductAttributeTableSeeder::class);
        // $this->call(ProductsImageTableSeeder::class);
        // $this->call(BrandTableSeeder::class);
        $this->call(BannerTableSeeder::class);

    }
}
