<?php

namespace Database\Factories;

use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Video>
 */
class VideoFactory extends Factory
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
            'link' => fake()->url(),
            'course_id' => Course::all()->random()->id,
            //
        ];
    }
}
