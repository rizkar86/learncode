<?php

namespace Database\Factories;

use App\Models\Track;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->randomElement([ 'HTML', 'CSS', 'JavaScript', 'PHP', 'Laravel', 'Vue.js', 'React.js', 'Angular', 'Node.js', 'Python']),
            'status' => fake()->randomElement([ 0, 1]),
            'link' => fake()->url(),
            'track_id' => Track::all()->random()->id,
            //
        ];
    }
}
