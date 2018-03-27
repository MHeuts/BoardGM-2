<?php

use App\Models\Order;
use Illuminate\Database\Seeder;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::statement('SET FOREIGN_KEY_CHECKS=0');
		DB::table('order')->truncate();
		DB::statement('SET FOREIGN_KEY_CHECKS=1');
		
        factory(Order::class, 10)->create();
    }
}
