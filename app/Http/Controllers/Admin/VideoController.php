<?php

namespace App\Http\Controllers\Admin;

use App\Events\VideoCreated;
use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Photo;
use App\Models\Track;
use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $videos=Video::orderByDesc('id','desc')->paginate(8);

        
        return view('admin.videos.index',compact('videos'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $courses=Course::orderBy('id','desc')->get();
    
        return view('admin.videos.create',compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
 
      
        $request->validate([
            'title' => 'required|min:3|max:255',
            'course_id' => 'required|integer',
            'link' => 'required|url',
        ]);


        $video =Video::create(
            [
                'title' => $request->title,
                'course_id' => $request->course_id,
                'link' => $request->link,
            ]
        );
        if($video)
        {
            event(new VideoCreated());
            return redirect('/admin/videos')->with('success', 'Video created successfully.');
        }
        else{
            return redirect('/admin/videos/create')->with('error', 'Something went wrong, please try again.');
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
        $video=Video::find($id);
        $courses=Course::orderBy('id','desc')->get();
        return view('admin.videos.edit',compact('video','courses'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Video $video)
    {
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
      
        return redirect('/admin/videos')->with('success', 'Video updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
    
        $video=Video::find($id);

    
        $video->delete();
        return redirect('/admin/videos')->with('success', 'Video deleted successfully.');
    }
}
