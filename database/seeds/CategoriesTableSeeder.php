<?php

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::statement('SET FOREIGN_KEY_CHECKS=0');
		DB::table('category')->truncate();
		DB::statement('SET FOREIGN_KEY_CHECKS=1');
		
		Category::create(['name' => 'Activity Categories']);
		Category::create(['parent_id' => 1, 'name' => 'City Building']);
		Category::create(['parent_id' => 1, 'name' => 'Civilization']);
		Category::create(['parent_id' => 1, 'name' => 'Educational']);
		Category::create(['parent_id' => 1, 'name' => 'Puzzle']);
		Category::create(['parent_id' => 1, 'name' => 'Racing']);
		Category::create(['parent_id' => 1, 'name' => 'Territory Building']);
		Category::create(['parent_id' => 1, 'name' => 'Transportation']);
		Category::create(['name' => 'Component Categories']);
		Category::create(['parent_id' => 9, 'name' => 'Card Game']);
		Category::create(['parent_id' => 9, 'name' => 'Collectible Components']);
		Category::create(['parent_id' => 9, 'name' => 'Dice']);
		Category::create(['parent_id' => 9, 'name' => 'Electronic']);
		Category::create(['parent_id' => 9, 'name' => 'Miniatures']);
		Category::create(['name' => 'Non-Game Categories']);
		Category::create(['parent_id' => 15, 'name' => 'Book']);
		Category::create(['parent_id' => 15, 'name' => 'Expansion for Base-game']);
		Category::create(['parent_id' => 15, 'name' => 'Game System']);
    }
}
