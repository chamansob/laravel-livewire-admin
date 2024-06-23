<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Blogcategory;
use App\Models\Blogtag;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blog>
 */
class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = $this->faker->words(rand(5, 10), true);
        return [
            'blogcat_id' => Blogcategory::all()->random()->id,
            'user_id' => 1,
            'post_title' => $title,
            'post_slug' => Str::slug($title),
            'post_image' => '',
            'short_descp' => fake()->text(),
            'long_descp' => fake()->text(),
            'post_tags' => Blogtag::all()->random()->id,
            //
        ];
    }
}
