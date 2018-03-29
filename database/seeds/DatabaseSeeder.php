<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$this->call([
			UsersTableSeeder::class,
			CategoriesTableSeeder::class,
			RolesTableSeeder::class,
			UserRolesTableSeeder::class,
			ProductsTableSeeder::class,
			ProductCategoriesTableSeeder::class,
			OrderStatesTableSeeder::class,
			OrdersTableSeeder::class,
			StockTableSeeder::class,
		]);
    }
}
