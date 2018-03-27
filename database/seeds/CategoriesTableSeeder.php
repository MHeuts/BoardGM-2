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
		
		Category::create(['name' => 'activity_categories']);
		Category::create(['parent_id' => 1, 'name' => 'city_building']);
		Category::create(['parent_id' => 1, 'name' => 'civilization']);
		Category::create(['parent_id' => 1, 'name' => 'educational']);
		Category::create(['parent_id' => 1, 'name' => 'puzzle']);
		Category::create(['parent_id' => 1, 'name' => 'racing']);
		Category::create(['parent_id' => 1, 'name' => 'territory_building']);
		Category::create(['parent_id' => 1, 'name' => 'transportation']);
		Category::create(['name' => 'component_categories']);
		Category::create(['parent_id' => 9, 'name' => 'card_game']);
		Category::create(['parent_id' => 9, 'name' => 'collectible_components']);
		Category::create(['parent_id' => 9, 'name' => 'dice']);
		Category::create(['parent_id' => 9, 'name' => 'electronic']);
		Category::create(['parent_id' => 9, 'name' => 'miniatures']);
		Category::create(['name' => 'non_game_categories']);
		Category::create(['parent_id' => 15, 'name' => 'book']);
		Category::create(['parent_id' => 15, 'name' => 'expansion_for_base_game']);
		Category::create(['parent_id' => 15, 'name' => 'game_system']);
    }
}
