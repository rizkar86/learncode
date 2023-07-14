<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Photo>
 */
class PhotoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $userid = User::all()->random()->id;
        $courseid = Course::all()->random()->id;
        $photoable_id = fake()->randomElement([ $userid, $courseid]);
        $photoable_type = $photoable_id == $userid ? 'App\Models\User' : 'App\Models\Course';
        return [
            'filename' => fake()->randomElement([ '1.jps', '2.jpg', '3.jpg', '4.jpg', '5.jpg', '6.jpg', '7.jpg', '8.jpg', '9.jpg','10.jpg']),
            'photoable_id' => $photoable_id,
            'photoable_type' => $photoable_type,
            //
        ];
    }
}
