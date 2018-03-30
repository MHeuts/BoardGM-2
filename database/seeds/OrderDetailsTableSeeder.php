<?php

use App\Models\OrderDetails;
use Illuminate\Database\Seeder;

class OrderDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
		DB::table('order_details')->truncate();
		DB::statement('SET FOREIGN_KEY_CHECKS=1');
		
        factory(OrderDetails::class, 10)->create();
    }
}
