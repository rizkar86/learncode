<?php

namespace App\Http\Controllers\Admin;

use App\Events\TrackCreated;
use App\Http\Controllers\Controller;
use App\Models\Track;
use Illuminate\Http\Request;

class TrackController extends Controller
{
  
    public function __construct()
    {
        $this->middleware('admin');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // get all tracks ordered by latest createdwith pagination
  
        $tracks = Track::orderBy('id', 'desc')->paginate(5);

    
     
        return view('admin.tracks.index', compact('tracks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.tracks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required|unique:tracks|max:255',
        ]);
        Track::create($request->all());
        return redirect('/admin/tracks')->with('success', 'Track created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Track $track)
    {
        //
        $courses = $track->courses()->paginate(8);
        return view('admin.tracks.show',compact('track','courses'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $track = Track::findOrFail($id);
        return view('admin.tracks.edit', compact('track'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Track $track)
    {
        //
     
        $request->validate([
            'name' => 'required|min:3|max:255',
        ]);

        if($request->has('name')){
            $track->name = $request->name;
        }
        if($track->isDirty()){
            $track->save();
            return redirect('/admin/tracks')->with('success', 'Track updated successfully.');
        }
        else{
            return redirect('/admin/tracks/'.$track->id.'/edit')->with('error', 'Nothing to update.');
        }
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $track = Track::findOrFail($id);
        $track->delete();
        return back()->with('success', 'Track deleted successfully.');
    }
}
