<?php

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::statement('SET FOREIGN_KEY_CHECKS=0');
		DB::table('product')->truncate();
		DB::statement('SET FOREIGN_KEY_CHECKS=1');
		
        factory(Product::class, 10)->create();
    }
}
