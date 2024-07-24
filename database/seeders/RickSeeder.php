<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RickSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Recipe::factory()
            ->count(20)
            ->create()
            ->each(function(\App\Models\Recipe $i) {
                $ingredient_count = rand(3, 8);
                $i->ingredients()->saveMany(
                    \App\Models\Ingredient::factory()->count($ingredient_count)->make()
                );
            });

        // \App\Models\Author::factory()
        //     ->count(10)
        //     ->create()
        //     ->each(function(\App\Models\Author $a) {
        //         $recipes_count = rand(1, 3);
        //         $a->recipes()->saveMany(
        //             \App\Models\Recipe::factory()
        //                 ->count($recipes_count)
        //                 ->create()
        //                 ->each(function(\App\Models\Recipe $i) {
        //                     $ingredient_count = rand(3, 8);
        //                     $i->ingredients()->saveMany(
        //                         \App\Models\Ingredient::factory()->count($ingredient_count)->create()
        //                     );
        //                 })
        //             );
        //     });
            
    }
}
