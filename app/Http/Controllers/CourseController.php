<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    //
    public function index($slug)
    {
       
        $course = Course::where('slug', $slug)->first();
        $videos = $course->videos()->get();
        $quizzes = $course->quizzes()->get();
        return view('course', compact('course', 'videos', 'quizzes'));
    }
}
