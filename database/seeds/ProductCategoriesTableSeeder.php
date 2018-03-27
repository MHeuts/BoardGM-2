<?php

use App\Models\ProductCategory;
use Illuminate\Database\Seeder;

class ProductCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
		DB::table('product_category')->truncate();
		DB::statement('SET FOREIGN_KEY_CHECKS=1');
		
        factory(ProductCategory::class, 10)->create();
    }
}
