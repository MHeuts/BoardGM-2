<?php

use App\Models\OrderState;
use Illuminate\Database\Seeder;

class OrderStatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
		DB::table('order_state')->truncate();
		DB::statement('SET FOREIGN_KEY_CHECKS=1');
		
		OrderState::create(['name' => 'ordered']);
		OrderState::create(['name' => 'in_transit']);
		OrderState::create(['name' => 'delivered']);
    }
}
