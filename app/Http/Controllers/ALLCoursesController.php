<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ALLCoursesController extends Controller
{
    public function index()
    {
        $user_id = Auth::user()->id;
        $user = User::findOrFail($user_id);
        $courses = Course::paginate(16);
        // get recommended courses
        return view('allcourses', compact('courses', 'user'));
    }
}
