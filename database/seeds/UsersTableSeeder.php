<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::statement('SET FOREIGN_KEY_CHECKS=0');
		DB::table('users')->truncate();
		DB::table('address')->truncate();
		DB::statement('SET FOREIGN_KEY_CHECKS=1');
		
		User::create([
			'name' => 'admin',
			'email' => 'admin@test.com',
			'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
			'remember_token' => str_random(10),
		]);
		
        factory(User::class, 10)->create();
    }
}
