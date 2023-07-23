<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Quiz;
use App\Models\Track;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['owner','admin']);
    }
    public function index()
    {
        $tracks = Track::orderBy('id', 'desc')->limit(5)->get();
        $courses = Course::orderBy('id', 'desc')->limit(5)->get();
        $users = User::orderBy('id', 'desc')->limit(5)->get();
        $quizzes = Quiz::orderBy('id', 'desc')->limit(5)->get();

        return view('admin.dashboard', compact('tracks', 'courses', 'users', 'quizzes'));
        
  
    }
    public function admins()
    {
        
        $auth_id= Auth::user()->id;
        $users = User::where('admin', 1)->whereNotIn('id',[$auth_id])->orderBy('id', 'desc')->paginate(15);
        return view('admin.admins.index', compact('users'));
    }
    public function create()
    {
        return view('admin.admins.create');
    }

    public function store(Request $request)
    {
        $attributes = request()->validate([
            'username' => 'required|max:255|min:2',
            'firstname' => 'max:100',
            'lastname' => 'max:100',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|min:8|max:255',
            'confirmPassword' => 'required|same:password',
            'admin' => 'required|integer'
        ]);
        User::create([
            'username' => $request->get('username'),
            'firstname' => $request->get('firstname'),
            'lastname' => $request->get('lastname'),
            'email' => $request->get('email') ,
            'address' => $request->get('address'),
            'city' => $request->get('city'),
            'country' => $request->get('country'),
            'postal' => $request->get('postal'),
            'about' => $request->get('about'),
            'password' => Hash::make($request->get('password')),
            'admin' => $request->get('admin')
        ]);


        return redirect('/admin/admins');
    }
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        return view('admin.admins.edit', compact('user'));
    }

    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);
        $attributes = $request->validate([
            'username' => ['required','max:255', 'min:2'],
            'firstname' => ['max:100'],
            'lastname' => ['max:100'],
            'email' => ['required', 'email', 'max:255'],
            'address' => ['max:100'],
            'city' => ['max:100'],
            'country' => ['max:100'],
            'postal' => ['max:100'],
            'about' => ['max:255']
        ]);


  

        $user->update([
            'username' => $request->get('username'),
            'firstname' => $request->get('firstname'),
            'lastname' => $request->get('lastname'),
            'email' => $request->get('email') ,
            'address' => $request->get('address'),
            'city' => $request->get('city'),
            'country' => $request->get('country'),
            'postal' => $request->get('postal'),
            'about' => $request->get('about')
        ]);
        return back()->with('success', 'Admin successfully updated');  
    }
   
    public function destroy( string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect('/admin/admins')->with('delete', 'Admin succesfully deleted');  
    }
}
