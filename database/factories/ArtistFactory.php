<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Artist>
 */
class ArtistFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = fake()->firstName() . ' ' . fake()->lastName();
        return [
            'name' => $name,
            'image_path' => fake()->imageUrl(200, 200, 'artists', true, $name),
        ];
    }
}
