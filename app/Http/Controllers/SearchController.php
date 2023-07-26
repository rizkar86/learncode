<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    //
    public function index(Request $request){
        $q = $request->q;
        $courses = Course::where('title', 'LIKE', "%{$q}%")->paginate(2);
        return view('search', compact('courses'));
    }
     
}
