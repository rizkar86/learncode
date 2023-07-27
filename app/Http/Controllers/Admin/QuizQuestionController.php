<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Quiz;
use Illuminate\Http\Request;

class QuizQuestionController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
   /**
     * Show the form for creating a new resource.
     */
    public function create(Quiz $quiz)
    {
        //
        return view('admin.questions.createQuestion',compact('quiz'));
    }
}
