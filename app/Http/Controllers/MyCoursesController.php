<?php
namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class MyCoursesController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $user_id = Auth::user()->id;
        $courses = User::findOrFail($user_id)->courses()->paginate(10);
        // get recommended courses
        return view('mycourses', compact('courses'));
    }
}
