<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    //
    public function index($slug)
    {
        
       $user =User::findOrFail(auth()->user()->id);
        $course = Course::where('slug', $slug)->first();
        $videos = $course->videos()->get();
        $quizzes = $course->quizzes()->get();
        // get all quizes ids form quiz_user table where user_id = auth()->user()->id
        $quizzesIds = $user->quizzes()->pluck('score','quiz_id')->toArray();
  


     
        return view('course', compact('course', 'videos', 'quizzes', 'quizzesIds'));
    }
}
