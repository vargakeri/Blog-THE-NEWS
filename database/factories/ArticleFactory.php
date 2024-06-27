<?php

namespace Database\Factories;

use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $defaultImagePath = '/default.jpg';
        return [
            'title' => $this->faker->sentence(),
            'subtitle' => $this->faker->sentence(),
            'body' => $this->faker->text(),
            'image' => $defaultImagePath,
            'user_id' => rand(1,10),
            'slug' => $this->faker->slug(),
            'is_accepted' => true,
            
        ];
    }
}
