<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Quiz;
use App\Models\User;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    //
    public function index($slug,$name)
    {
        $course = Course::where('slug', $slug)->first();
        $quiz = $course->quizzes()->where('name', $name)->first();
        $questions = $quiz->questions()->get();
        return view('quiz', compact('course','quiz', 'questions'));
    }
    // create submit function
    public function submit(Request $request, $slug, $name)
    {
      
        $course = Course::where('slug', $slug)->first();
        $quiz = $course->quizzes()->where('name', $name)->first();
        $questions = $quiz->questions()->get();
        $score = 0;
        $correctAnswers = [];
        $incorrectAnswers = [];
        foreach ($questions as $question) {
            $your_answer =trim($request['answer'.$question->id]);
 
       
            if($your_answer == $question->right_answer) {
                $score = $score + $question->score ;
                $question->your_answer = $your_answer;
                $correctAnswers[] = $question;

            }
            else {
                // add $your_answer to question
                $question->your_answer = $your_answer;



                $incorrectAnswers[] = $question;
            }
        }
        $user = User::findOrFail( auth()->user()->id);
        $user->quizzes()->attach($quiz->id, ['score' => $score]);
        // incremnt his score
        $user->score = $user->score + $score;
        $user->save();
        return view('quiz', compact('course','quiz', 'questions','score', 'correctAnswers', 'incorrectAnswers'));
  
 
     
       
    }
}
