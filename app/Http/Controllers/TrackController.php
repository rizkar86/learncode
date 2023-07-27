<?php

namespace App\Http\Controllers;

use App\Models\Track;
use Illuminate\Http\Request;

class TrackController extends Controller
{
    //
    public function index($name)
    {
       $track = Track::where('name', $name)->first();
       // get paginate courses for this track
        $courses = Track::where('name', $name)->first()->courses()->paginate(10);
  
        return view('track_courses', compact('courses', 'track'));
    }
}
