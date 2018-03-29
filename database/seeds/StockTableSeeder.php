<?php

use App\Models\Stock;
use Illuminate\Database\Seeder;

class StockTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
		DB::table('stock')->truncate();
		DB::statement('SET FOREIGN_KEY_CHECKS=1');
		
        factory(Stock::class, 10)->create();
    }
}
