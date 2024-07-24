<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Recipe>
 */
class RecipeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        // an array of image names
        $images = [
            "image1.jpg",
            "image2.jpg",
            "image3.jpg",
            "image4.jpg",
            "image5.jpg",
            "image6.jpg",
            "image7.jpg",
            "image8.jpg",
            "image9.jpg",
            "image10.jpg",
            "image11.jpg",
            "image12.jpg",
            // "image.jpg",
            // "image_1.jpg",
            // "image.jpg",
            // "image_1.jpg",
            // "image.jpg",
            // "image_1.jpg",
            // "image.jpg"
        ];
        
        // random number of serves
        $serves = rand(1,5);
        
        // select a random image from the array
        $image = $images[rand(0, count($images)-1)];
        
        // return an array of default state for the Recipe model
        return [
            'title' => fake()->sentence, // generate a fake sentence as a title
            'description' => fake()->paragraph, // generate a fake paragraph as a description
            'cooking_method' => fake()->text(200), // generate fake text as cooking method
            'prep_time' => fake()->sentence, // generate a fake sentence as prep time
            'serves' => $serves, // use the random number of serves
            'image' => $image, // use the randomly selected image
            'author_id' => \App\Models\Author::factory(), // use a factory to generate an author_id
            'created_at' => Carbon::now(), // set the current timestamp as the creation time
            'updated_at' => Carbon::now() // set the current timestamp as the update time
        ];
    }
}