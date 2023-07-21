<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Video;
use Illuminate\Http\Request;

class CourseVideoController extends Controller
{
  

    /**
     * Show the form for creating a new resource.
     */
    public function create(Course $course)
    {
        //
        return view('admin.courses.createVideo',compact('course'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,Course $course)
    {
        //
        $request->validate([
            'title' => 'required|min:3|max:255',
            'link' => 'required|url',
        ]);


        $video =Video::create(
            [
                'title' => $request->title,
                'course_id' => $course->id,
                'link' => $request->link,
            ]
        );
        if($video)
        {
            return redirect('/admin/courses/'.$course->id)->with('success', 'Video created successfully.');
        }
        else{
            return redirect('/admin/courses/'.$course->id.'/videos/create')->with('error', 'Something went wrong, please try again.');
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
    public function edit(Course $course,Video $video)
    {
        //
        return view('admin.courses.editVideo',compact('course','video'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,Course $course, Video $video)
    {
        //
        $request->validate([
            'title' => 'required|min:3|max:255',
            'course_id' => 'required|integer',
            'link' => 'required|url',
        ]);
        
        $video->update(
            [
                'title' => $request->title,
                'course_id' => $request->course_id,
                'link' => $request->link,
            ]
        );
      

        return redirect('/admin/courses/'.$course->id)->with('success', 'Video updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course, Video $video)
    {
        //
        $video->delete();
        return redirect('/admin/courses/'.$course->id)->with('success', 'Video deleted successfully.');
    }
}
