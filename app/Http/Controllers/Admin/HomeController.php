<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Quiz;
use App\Models\Track;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
        /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
     /*    $tracks = Track::orderBy('id', 'desc')->limit(5)->get();
        $courses = Course::orderBy('id', 'desc')->limit(5)->get();
        $users = User::orderBy('id', 'desc')->limit(5)->get();
        $quizzes = Quiz::orderBy('id', 'desc')->limit(5)->get();

        return view('admin.dashboard', compact('tracks', 'courses', 'users', 'quizzes')); */

     
        $user_courses = User::findOrFail(2)->courses;
        $tracks  = Track::with('courses')->orderBy('id', 'desc')->get();

        // get famous tracks ids
        $famous_tracks_ids = Course::pluck('track_id')->countBy()->sort()->reverse()->keys()->take(10);

        // get famous tracks
        $famous_tracks = Track::withCount('courses')->whereIn('id', $famous_tracks_ids)->orderBy('courses_count','desc')->get();

        // get recommended courses
        
        $user_courses_ids = User::findOrFail(2)->courses()->pluck('course_id');
       
        $user_tracks_ids = User::findOrFail(2)->tracks()->pluck('track_id');
      
        $recommended_courses = Course::whereIn('track_id', $user_tracks_ids)->whereNotIn('id', $user_courses_ids)->get();

      
    
 
        return view('home', compact('user_courses', 'tracks', 'famous_tracks', 'recommended_courses'));

    }
}
