<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Page;

class PagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Page::create(["title" => "About Us", "content" => static::getAboutPageText()]);
        Page::create(["title" => "Contact", "content" => fake()->paragraphs(3, true)]);
        Page::create(["title" => "Welcome to Taste!", "content" => fake()->paragraphs(3, true)]);
        // Page::create(["title" => "Korean", "content" => fake()->paragraphs(3, true)]);
    }

    protected static function getAboutPageText()
    {
        return fake()->paragraphs(7, true);
    }
}
