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
            'admin' => 1,
            'email' => 'admin@argon.com',
            'password' => $password,
            'score' => fake()->randomElement([ 100, 150, 200, 155, 190]),
        ]);
        DB::table('users')->insert([
            'username' => 'rizkar',
            'firstname' => 'rizkar',
            'lastname' => 'mohamed',
            'admin' => 1,
            'email' => 'eng.rizkar@gmail.com',
            'password' => $password,
            'score' => fake()->randomElement([ 100, 150, 200, 155, 190]),
        ]);
        $users = User::factory()->count(8)->create();
        $trackNames=['Web Development', 'Data Science', 'Digital Marketing', 'Mobile App Development', 'Business and Entrepreneurship', 'Artificial Intelligence and Robotics','Graphic Design'];
        foreach ($trackNames as $trackName) {
            Track::create([
                'name' => $trackName,
            ]);
        }
        $coursesNames =   [ 
            'HTML and CSS Fundamentals','JavaScript for Beginners','Front-end Frameworks React Angular or Vue.js','Back-end Development Node.js Express MongoDB','Full-stack Web Development Project'
            ,'Python for Data Science NumPy Pandas','Data Cleaning and Preprocessing','Data Visualization with Matplotlib and Seaborn','Machine Learning Algorithms Regression Classification','Deep Learning with TensorFlow Keras'
            ,'Introduction to Digital Marketing','Search Engine Optimization SEO','Social Media Marketing (Facebook, Instagram, Twitter','Google Ads PPC and Analytics','Content Marketing and Email Marketing' 
            ,'Introduction to Mobile App Development Android or iOS','Mobile App UI Design and User Experience','Mobile App Programming JavaKotlin for Android, Swift for iOS','Mobile App Testing and Debugging','Publishing and Marketing Your App'   
            ,'Business Fundamentals and Startup Basics','Marketing Strategy and Market Research','Financial Management and Budgeting','Project Management and Agile Methodology','Leadership and Team Management'
            ,'Introduction to Artificial Intelligence','Machine Learning Algorithms and Techniques','Robotics and Autonomous Systems','Computer Vision and Image Processing','Natural Language Processing NLP'
            ,'Adobe Photoshop Basics','Adobe Illustrator Fundamentals','Logo Design and Branding','Typography and Layout Design','Designing for Web and Print'
            ];
            $i = 1;
            $count = 1;
        foreach ($coursesNames as  $courseName) {
        
        
            Course::create([
                'title' => $courseName,
                'description' => fake()->paragraph(),
                'slug' => strtolower(str_replace(' ', '-', $courseName)),
                'status' => fake()->randomElement([ 0, 1]),
                'link' => fake()->url(),
                'track_id' => $i
            ]);
            
            if ($count % 5 === 0) 
                $i++;

            $count++;    
        }
      /*  $tracks = Track::factory()->count(10)->create();
         foreach ($users as $user) {
            $tracks_ids = [];
            $tracks_ids[] = Track::all()->random()->id;
            $tracks_ids[] = Track::all()->random()->id;
            $user->tracks()->sync($tracks_ids);
        } */
        //$courses = Course::factory()->count(50)->create();
      /*   foreach ($users as $user) {
            $courses_ids = [];
            $courses_ids[] = Course::all()->random()->id;
            $courses_ids[] = Course::all()->random()->id;
            $courses_ids[] = Course::all()->random()->id;
            $user->courses()->sync($courses_ids);
        } */
        Video::factory()->count(100)->create();
       $quizzes =  Quiz::factory()->count(100)->create();
    /*    foreach ($users as $user) {
        $quizzes_ids = [];
        $quizzes_ids[] = Quiz::all()->random()->id;
        $quizzes_ids[] = Quiz::all()->random()->id;
        $quizzes_ids[] = Quiz::all()->random()->id;
        $quizzes_ids[] = Quiz::all()->random()->id;
        $user->quizzes()->sync($quizzes_ids);
        } */
        Question::factory()->count(400)->create();
        Photo::factory()->count(150)->create();
    }
}
