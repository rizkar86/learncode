<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseQuizController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create(Course $course)
    {
        //
        return view('admin.courses.createQuiz',compact('course'));
    }
}
