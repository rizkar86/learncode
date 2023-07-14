<?php

namespace Database\Factories;

use App\Models\Quiz;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Question>
 */
class QuestionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $answers = fake()->sentence(4);
        $words = explode(' ', $answers);
        $right_answer = $words[array_rand($words)];
        return [
            'title' => fake()->sentence(),
            'answers' => $answers,
            'right_answer' =>  $right_answer,
            'score' => fake()->randomElement([ 5, 10, 15, 20]),
            'quiz_id' => Quiz::all()->random()->id,
            //
        ];
    }
}
