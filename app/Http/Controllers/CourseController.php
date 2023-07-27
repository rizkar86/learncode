<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index($slug)
    {
        $enrolled = false;
        
       $user =User::findOrFail(auth()->user()->id);
        $course = Course::where('slug', $slug)->first();
        if ($user->courses()->where('slug', $slug)->exists()) 
        {
            $enrolled = true;
        }
        $videos = $course->videos()->get();
        $quizzes = $course->quizzes()->get();
        // get all quizes ids form quiz_user table where user_id = auth()->user()->id
        $quizzesIds = $user->quizzes()->pluck('score','quiz_id')->toArray();
  


     
        return view('course', compact('course', 'videos', 'quizzes', 'quizzesIds', 'enrolled'));
    }
    public function enroll($slug)
    {
        $course = Course::where('slug', $slug)->first();
        $user = User::findOrFail(auth()->user()->id);
        if ($user->courses()->where('slug', $slug)->exists()) {
            return redirect()->back()->with('error', 'You have already enrolled in this course');
        }
        $track = $course->track;
;
        $user->tracks()->syncWithoutDetaching( $track->id );
        $user->courses()->syncWithoutDetaching($course->id);
        return redirect()->back()->with('success', 'You have enrolled in this course successfully');
    }
}
