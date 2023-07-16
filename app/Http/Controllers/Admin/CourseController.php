<?php

namespace App\Http\Controllers\Admin;

use App\Events\CourseCreated;
use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Photo;
use App\Models\Track;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $courses=Course::withCount('users')->orderByDesc('users_count')->paginate(8);

        
        return view('admin.courses.index',compact('courses'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $tracks=Track::orderBy('id','desc')->get();
        return view('admin.courses.create',compact('tracks'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
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
        event(new CourseCreated());
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
            return redirect('/admin/courses')->with('success', 'Course created successfully.');
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
    public function edit(string $id)
    {
        //
        $course=Course::find($id);
        $tracks=Track::orderBy('id','desc')->get();
        return view('admin.courses.edit',compact('course','tracks'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
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
        return redirect('/admin/courses')->with('success', 'Course updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
    
        $course=Course::find($id);

        if($course->photo)
        {
           unlink(public_path('img/'.$course->photo->filename));

        }
 
        // unlink 
   
        $course->photo->delete();
        $course->delete();
        return redirect('/admin/courses')->with('success', 'Course deleted successfully.');
    }
}
