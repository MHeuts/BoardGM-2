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
			AddressTableSeeder::class,
			UsersTableSeeder::class,
			CategoriesTableSeeder::class,
			RolesTableSeeder::class,
			UserRolesTableSeeder::class,
			ProductsTableSeeder::class,
			ProductCategoriesTableSeeder::class,
			OrderStatesTableSeeder::class,
			OrdersTableSeeder::class,
			OrderDetailsTableSeeder::class,
		]);
    }
}
