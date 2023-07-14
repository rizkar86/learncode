<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Photo;
use App\Models\Question;
use App\Models\Quiz;
use App\Models\Track;
use App\Models\User;
use App\Models\Video;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $password = Hash::make('secret');
        DB::table('users')->insert([
            'username' => 'admin',
            'firstname' => 'Admin',
            'lastname' => 'Admin',
            'email' => 'admin@argon.com',
            'password' => $password,
            'score' => fake()->randomElement([ 100, 150, 200, 155, 190]),
        ]);
        $users = User::factory()->count(9)->create();
        $tracks = Track::factory()->count(10)->create();
        foreach ($users as $user) {
            $tracks_ids = [];
            $tracks_ids[] = Track::all()->random()->id;
            $tracks_ids[] = Track::all()->random()->id;
            $user->tracks()->sync($tracks_ids);
        }
        $courses = Course::factory()->count(50)->create();
        foreach ($users as $user) {
            $courses_ids = [];
            $courses_ids[] = Course::all()->random()->id;
            $courses_ids[] = Course::all()->random()->id;
            $courses_ids[] = Course::all()->random()->id;
            $user->courses()->sync($courses_ids);
        }
        Video::factory()->count(100)->create();
       $quizzes =  Quiz::factory()->count(100)->create();
       foreach ($users as $user) {
        $quizzes_ids = [];
        $quizzes_ids[] = Quiz::all()->random()->id;
        $quizzes_ids[] = Quiz::all()->random()->id;
        $quizzes_ids[] = Quiz::all()->random()->id;
        $quizzes_ids[] = Quiz::all()->random()->id;
        $user->quizzes()->sync($quizzes_ids);
        }
        Question::factory()->count(400)->create();
        Photo::factory()->count(150)->create();
    }
}
