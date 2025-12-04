<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Listing>
 */
class ListingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'title' => $this->faker->sentence(),
            'description' => $this->faker->paragraph(2),
            'price' => $this->faker->numberBetween(10, 1000) * 100,
            'location' => $this->faker->city(),
            'category' => $this->faker->randomElement(['Info', 'Maison', 'Véhicule', 'Mode', 'Loisirs', 'Autre']),
            'status' => $this->faker->randomElement(['draft', 'published']),

        ];
    }
}
