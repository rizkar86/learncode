<?php

namespace App\Http\Controllers;

use App\Models\Track;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TrackController extends Controller
{
    //
    public function index($name)
    {
        $user_id = Auth::user()->id;
        $user = User::findOrFail($user_id);
        $track = Track::where('name', $name)->first();
       // get paginate courses for this track
        $courses = Track::where('name', $name)->first()->courses()->paginate(10);
  
        return view('track_courses', compact('courses', 'track','user'));
    }
}
