<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Point>
 */
class PointFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $users = User::pluck('id')->toArray();
        $creates = [
            now(),
            now()->addMonths(3),
            now()->addMonths(6),
            now()->addMonths(9),
        ];
        $expires = [
            now()->endOfQuarter(),
            now()->addMonths(3)->endOfQuarter(),
            now()->addMonths(6)->endOfQuarter(),
            now()->addMonths(9)->endOfQuarter(),
        ];
        $index = fake()->numberBetween(0, 3);
        return [
            'user_id' => fake()->randomElement($users),
            'point' => fake()->numberBetween(2, 100),
            'title' => 'Lucky Point',
            'used' => fake()->numberBetween(0, 2),
            'is_active' => true,
            'created_at' => $creates[$index],
            'expired_at' => $expires[$index],
        ];
    }
}
