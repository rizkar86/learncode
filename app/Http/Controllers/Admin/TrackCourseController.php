<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Photo;
use App\Models\Track;
use Illuminate\Http\Request;

class TrackCourseController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
       /**
     * Show the form for creating a new resource.
     */
    public function create(Track $track)
    {
        //
        return view('admin.tracks.createCourse',compact('track'));
      
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,Track $track)
    {
        $stauts = 0;
      
        $request->validate([
            'title' => 'required|min:3|max:255',
            'track_id' => 'required|integer',
            'link' => 'required|url',
        ]);

        if($request->has('status') and $request->status == 'on'){
            $stauts = 1;
        }

        $course =Course::create(
            [
                'title' => $request->title,
                'track_id' => $request->track_id,
                'link' => $request->link,
                'status' => $stauts,
            ]
        );
        if($course){
            if($file = $request->file('image')){
                $fileName = $file->getClientOriginalName();
                $fileName = time().'_'.$fileName;
                if($file->move(public_path('img'), $fileName))
                {
                    Photo::create([
                        'filename' => $fileName,
                        'photoable_id' => $course->id,
                        'photoable_type' => 'App\Models\Course',
                    ]);
                }
            }
            return redirect('/admin/tracks/'.$track->id)->with('success', 'Course created successfully.');
        }

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
    public function edit(Track $track,Course $course)
    {
        //
    
        return view('admin.tracks.editCourse',compact('track','course'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,Track $track,Course $course)
    {
        $stauts = 0;
        $request->validate([
            'title' => 'required|min:3|max:255',
            'track_id' => 'required|integer',
            'link' => 'required|url',
        ]);

        if($request->has('status') and $request->status == 'on')
        {
            $stauts = 1;
        }

        $course->update(
            [
                'title' => $request->title,
                'track_id' => $request->track_id,
                'link' => $request->link,
                'status' => $stauts,
            ]
        );
        if($file = $request->file('image')){
            $fileName = $file->getClientOriginalName();
            $fileName = time().'_'.$fileName;
            if($file->move(public_path('img'), $fileName))
            {
                if($course->photo){
                    unlink(public_path('img/'.$course->photo->filename));
                    $course->photo->filename = $fileName;
                    $course->photo->save();
                }
                else{
                    Photo::create([
                        'filename' => $fileName,
                        'photoable_id' => $course->id,
                        'photoable_type' => 'App\Models\Course',
                    ]);
                }         
            }
        }

        return redirect('/admin/tracks/'.$track->id)->with('success', 'Course updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Track $track,Course $course)
    {
        //
        $course->delete();
        return back()->with('success', 'Course deleted successfully.');
    }
}
