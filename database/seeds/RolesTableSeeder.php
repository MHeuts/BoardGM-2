<?php

use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
		DB::table('role')->truncate();
		DB::statement('SET FOREIGN_KEY_CHECKS=1');
		
		Role::create(['name' => 'user']);
		Role::create(['name' => 'admin']);
    }
}
