<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Track>
 */
class TrackFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->randomElement(['Web Development', 'Data Science', 'Digital Marketing', 'Mobile App Development', 'Business and Entrepreneurship', 'Artificial Intelligence and Robotics','Graphic Design']),
            //
        ];
    }
}
