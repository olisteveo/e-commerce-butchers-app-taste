<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create(["name" => "Italian", "description" => "Italian Cuisine"]);
        Category::create(["name" => "French", "description" => "French Delicatessens"]);
        Category::create(["name" => "Mexican", "description" => "Mexican Cuisine"]);
        Category::create(["name" => "Korean", "description" => "Korean Cuisine"]);
        Category::create(["name" => "Breakfast", "description" => "Breakfast Recipes"]);
        Category::create(["name" => "Lunch", "description" => "Lunchtime Dishes"]);
        Category::create(["name" => "Dinner", "description" => "Dinner Recipes"]);
        Category::create(["name" => "Deserts", "description" => "Deserts Recipes"]);
    }
}
