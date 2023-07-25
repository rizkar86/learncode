<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $questions = Question::orderBy('id','desc')->paginate(8);
        return view('admin.questions.index',compact('questions'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $quizzes = Quiz::all();
        return view('admin.questions.create', compact('quizzes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'title' => 'required|string|max:255',
            'quiz_id' => 'required|exists:quizzes,id',
            'answers' => 'required',
            'right_answer' => 'required|string|max:255',
            'score' => 'required|numeric',
            'type' => 'required|in:text,checkbox',
        ]);
  
        // if answers not contain comma
        if (!str_contains($request->answers, ',')) {
            return back()->with('error','Answers must be separated by comma');
        }
        //if answers end with comma
        if (str_ends_with($request->answers, ',')) {
            return back()->with('error','Answers must not end with comma');
        }




        $answersArr = explode(',', $request->answers);
        // if right_answer not in answersArr
        if (!in_array($request->right_answer, $answersArr)) {
            return back()->with('error','Right answer must be one of the answers');
        }

        Question::create($request->all());
        return redirect()->route('questions.index')->with('success','Question created successfully');
    }

  

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Question $question)
    {
        //
        $quizzes = Quiz::all();
        return view('admin.questions.edit', compact('question','quizzes'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Question $question)
    {
        //
        $request->validate([
            'title' => 'required|string|max:255',
            'quiz_id' => 'required|exists:quizzes,id',
            'answers' => 'required',
            'right_answer' => 'required|string|max:255',
            'score' => 'required|numeric',
        ]);
            // if answers not contain comma
            if (!str_contains($request->answers, ',')) {
                return back()->with('error','Answers must be separated by comma');
            }
            //if answers end with comma
            if (str_ends_with($request->answers, ',')) {
                return back()->with('error','Answers must not end with comma');
            }

        $answersArr = explode(',', $request->answers);
        // if right_answer not in answersArr
        if (!in_array($request->right_answer, $answersArr)) {
            return back()->with('error','Right answer must be one of the answers');
        }
        $question->update($request->all());
        return redirect()->route('questions.index')->with('success','Question updated successfully');
  



    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $question= Question::findOrFail($id);
        $quiz = $question->quiz;
        $question->delete();
        return back()->with('success','Question deleted successfully');
       // return redirect()->route('quizzes.show', $quiz)->with('success','Question deleted successfully');

    }
}
