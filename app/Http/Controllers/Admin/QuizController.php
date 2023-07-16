<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Quiz;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $quizzes = Quiz::orderBy('id','desc')->paginate(8);
        return view('admin.quizzes.index',compact('quizzes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $courses=Course::orderBy('id','desc')->get();
        return view('admin.quizzes.create',compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required|string|max:255',
            'course_id' => 'required|integer',
        ]);
     
        Quiz::create($request->all());
        return redirect()->route('quizzes.index')->with('success','Quiz created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $courses=Course::orderBy('id','desc')->get();
        $quiz = Quiz::findOrFail($id);
        return view('admin.quizzes.edit',compact('quiz','courses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Quiz $quiz)
    {
        //
        $request->validate([
            'name' => 'required|string|max:255',
            'course_id' => 'required|integer',
        ]);
        $quiz->update($request->all());
        return redirect()->route('quizzes.index')->with('success','Quiz updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        Quiz::findOrFail($id)->delete();

        return redirect()->route('quizzes.index')->with('success','Quiz deleted successfully');

    }
}
