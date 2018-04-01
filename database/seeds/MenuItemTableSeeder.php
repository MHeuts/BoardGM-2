<?php

use App\Models\MenuItem;
use Illuminate\Database\Seeder;

class MenuItemTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
		DB::table('menuitem')->truncate();
		DB::statement('SET FOREIGN_KEY_CHECKS=1');
		
		MenuItem::create(['name' => 'About', 'url' => '/about']);
		MenuItem::create(['name' => 'Catalog', 'url' => '/products']);
    }
}
