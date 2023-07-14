<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('owner');
    }
    public function index()
    {
        $users = User::where('admin', 0)->orderBy('id', 'desc')->paginate(5);
        return view('admin.users.index', compact('users'));
    }
    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
 
        $attributes = request()->validate([
            'username' => 'required|max:255|min:5',
            'firstname' => 'max:100',
            'lastname' => 'max:100',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|min:8|max:255',
            'confirmPassword' => 'required|same:password',
            'address' => ['max:100'],
            'city' => ['max:100'],
            'country' => ['max:100'],
            'postal' => ['max:100'],
            'about' => ['max:255'],
            'admin' => 'required|integer'
        ]);
        $user = User::create($attributes);

        return redirect('/admin/users');
    }
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);
        $attributes = $request->validate([
            'username' => ['required','max:255', 'min:5'],
            'firstname' => ['max:100'],
            'lastname' => ['max:100'],
            'email' => ['required', 'email', 'max:255'],
            'address' => ['max:100'],
            'city' => ['max:100'],
            'country' => ['max:100'],
            'postal' => ['max:100'],
            'about' => ['max:255'],
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
        return back()->with('succes', 'User succesfully updated');  
    }
   
    public function destroy( string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect('/admin/users')->with('delete', 'User succesfully deleted');  
    }
}
