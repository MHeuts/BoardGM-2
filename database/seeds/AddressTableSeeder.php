<?php

use App\Models\Address;
use Illuminate\Database\Seeder;

class AddressTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
		DB::table('address')->truncate();
		DB::statement('SET FOREIGN_KEY_CHECKS=1');
		
		//Admin
		Address::create([
			'street' => 'Admin straat',
			'number' => '1A',
			'zipcode' => '1111AA',
			'city' => 'Admin Stad',
		]);
    }
}
