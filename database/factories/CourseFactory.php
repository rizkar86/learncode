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
        $title = fake()->randomElement(
            [ 

                'HTML and CSS Fundamentals'
                ,'JavaScript for Beginners'
                ,'Front-end Frameworks (React, Angular, or Vue.js)'
                ,'Back-end Development (Node.js, Express, MongoDB)'
                ,'Full-stack Web Development Project'
               
                
                ,'Python for Data Science (NumPy, Pandas)'
                ,'Data Cleaning and Preprocessing'
                ,'Data Visualization with Matplotlib and Seaborn'
                ,'Machine Learning Algorithms (Regression, Classification)'
                ,'Deep Learning with TensorFlow/Keras'
                ,'Data Science Project and Case Studies'
              
                
                ,'Introduction to Digital Marketing'
                ,'Search Engine Optimization (SEO)'
                ,'Social Media Marketing (Facebook, Instagram, Twitter)'
                ,'Google Ads (PPC) and Analytics'
                ,'Content Marketing and Email Marketing'
                ,'Digital Marketing Strategy and Campaign Planning'
               
                
                ,'Introduction to Mobile App Development (Android or iOS)'
                ,'Mobile App UI Design and User Experience'
                ,'Mobile App Programming (Java/Kotlin for Android, Swift for iOS)'
                ,'Mobile App Testing and Debugging'
                ,'Publishing and Marketing Your App'
                
                
                ,'Business Fundamentals and Startup Basics'
                ,'Marketing Strategy and Market Research'
                ,'Financial Management and Budgeting'
                ,'Project Management and Agile Methodology'
                ,'Leadership and Team Management'
              
                
                ,'Introduction to Artificial Intelligence'
                ,'Machine Learning Algorithms and Techniques'
                ,'Robotics and Autonomous Systems'
                ,'Computer Vision and Image Processing'
                ,'Natural Language Processing (NLP)'
              
                
                ,'Adobe Photoshop Basics'
                ,'Adobe Illustrator Fundamentals'
                ,'Logo Design and Branding'
                ,'Typography and Layout Design'
                ,'Designing for Web and Print'
                ]
            
        
        );
    

            
            
        
       
      
        return [
            'title' => $title,
            'description' => fake()->paragraph(5),
            'slug' => strtolower(str_replace(' ', '-', $title)),
            'status' => fake()->randomElement([ 0, 1]),
            'link' => fake()->url(),
            'track_id' => Track::all()->random()->id,
            //
        ];
    }
}
