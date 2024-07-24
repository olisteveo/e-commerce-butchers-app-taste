<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use App\Models\Author;
use App\Models\Recipe;
use App\Models\Ingredient;
use App\Models\Recipe2category;

class UsersDevSeeder extends UsersSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        parent::run();
        User::factory(20)
            ->create()
            // @Spongebob - MagiC
            ->each(static::author());
    }

    public static function author()
    {
        return function($user) {
            if(rand(0,1)) {
                $user->roles_id = Role::AUTHOR_ROLE;
                $user->save();
                Author::factory(1)
                    ->create([
                        "user_id" => $user->id,
                        "author_name" => $user->name
                    ])
                    // @Spiderman - Magic with a kick
                    ->each(static::author_recipe());
                // next line starts here
            }
        };
    }

    public static function author_recipe()
    {
        $recipes_count = rand(1, 3);
        return function($author) use($recipes_count) {
            Recipe::factory($recipes_count)
                ->create([
                    "author_id" => $author->id
                ])->each(static::recipe());
        };
    }
    public static function recipe()
    {
        $ingredient_count = rand(3, 8);
        return function($recipe) use ($ingredient_count) {
            Recipe2category::create([
                "recipe_id" => $recipe->id,
                "category_id" => rand(1, 8)
            ]);
            Ingredient::factory($ingredient_count)
                ->create([
                    "recipe_id" => $recipe->id
                ]);
        };
    }
}
