<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => 1,
            'title' => fake()->sentence,
            'short_content' => fake()->sentence(15),
            'content' => fake()->paragraph(15,true ),
//            'photo' => $this->faker->imageUrl(640, 480, 'cats', true),
        ];
    }
}
