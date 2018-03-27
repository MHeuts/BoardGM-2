<?php

use App\Models\UserRole;
use Illuminate\Database\Seeder;

class UserRolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
		DB::table('user_role')->truncate();
		DB::statement('SET FOREIGN_KEY_CHECKS=1');
		
		//Admin
		UserRole::create([
			'user_id' => 1,
			'role_id' => 2,
		]);
		
        factory(UserRole::class, 10)->create();
    }
}
