@extends('layouts.user_layout')
@section('content')
    @include('includes.home_haeder')
    <div id="alert">
        @include('components.alert')
    </div>
    @if ($errors->any())
    <div class="alert alert-danger text-white">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
     @endif
    <div class="card mb-4">
      
        
        <div class="card-body container px-0 pt-0 pb-2 mt-5 ">
                <div class="row mb-5">
                    <div class="col-6">
                        <div class="course-photo">
                            @if ($course->photo)
                            <img  src="{{asset('img/'.$course->photo->filename.'')}}" class="card-img-top" alt="...">
                            @else
                            <img  src="{{asset('img/1.jpg')}}" class="card-img-top" alt="image">
                            @endif
                        </div>
                    </div>
                    <div class="col-6 ">
                        <div class="course-info">
                            <h3>{{$course->title}}</h3>
                            <p>{{$course->description}}</p>
                          
                            <span ><small class="text-success fw-bold">{{$course->status == 0 ? 'FREE' : 'PAID'}}</small></span>
                            <span class="float-end"><small class="text-success fw-bold">{{count( $course->users)}} Users</small></span>
                            <br>
                            <br>
                            <a class="mt-5" href="/tracks/{{$course->track->name}}"><h5>Track : {{$course->track->name}}<h5></a> 
                                @if($enrolled == false)  
                                    <div class="enrol-form float-end">
                                        <form method="POST" action="/courses/{{$course->slug}}">
                                            @csrf
                                            <input type="submit" class="btn btn-success" value="Enroll Now">
                                        </form>
                
                                    </div>
                                @else
                                <div class="p-3 mb-2 bg-success text-white">You have already enrolled </div>
                                @endif
                        </div>     
                    </div>
                 
                </div>
                <div class="row mt-5">
                    <div>
                        <h2>Course Videos</h2>
                    </div>
                    @if($enrolled == true)  
                        @foreach ($videos as $video)
                        <!-- Button trigger modal -->
                        <!-- style hover background color -->

                        <a class="p-3 fw-bold video-btn border mb-2"  href="{{$video->link}}"  data-bs-toggle="modal" data-bs-target="#show-video" > 
                            <i class="fab fa-youtube me-3 text-danger "></i>{{$video->title}}
                        </a>
                        @endforeach
                  
                    @else
                    @foreach ($videos as $video)
                    <!-- Button trigger modal -->
                    <!-- style hover background color -->

                        <a class="p-3 fw-bold video-btn border mb-2 disabled"  style="pointer-events: none;
                        color: #6c757d;
                        text-decoration: none;" href="{{$video->link}}"  data-bs-toggle="modal" data-bs-target="#show-video" > 
                            <i class="fab fa-youtube me-3 text-danger "></i>{{$video->title}}
                        </a>
                    @endforeach
                    @endif
                     <!-- Modal -->
                   
                    <div class="modal fade" id="show-video" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Video Preview</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <iframe width="100%" height="600"  src="" ></iframe>                            
                                </div>
                        
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-5">
                    <div>
                        <h2>Course Qizzes</h2>
                    </div>
                    @if($enrolled == true)
                        @foreach ($quizzes as $quiz)
                        <!-- Button trigger modal -->
                        <!-- style hover background color -->
                        @if(array_key_exists($quiz->id,$quizzesIds))
                        <a class="p-3 fw-bold video-btn border mb-2 disapalled" style="pointer-events: none;
                        color: #6c757d;
                        text-decoration: none;"  href="/courses/{{$course->slug}}/quizzes/{{$quiz->name}}"  target="_blank"> {{$quiz->name}} <span class="float-end"> Score : {{$quizzesIds[$quiz->id]}}</span>
                        </a>
                        @else



                        <a class="p-3 fw-bold video-btn border mb-2" href="/courses/{{$course->slug}}/quizzes/{{$quiz->name}}"  target="_blank"> {{$quiz->name}}
                        </a>
                        @endif
                    
                    <!-- Modal -->
                   
                         @endforeach
                    @else
                        @foreach ($quizzes as $quiz)
                            <a class="p-3 fw-bold video-btn border mb-2" style="pointer-events: none;color: #6c757d;text-decoration: none;" href="/courses/{{$course->slug}}/quizzes/{{$quiz->name}}"  target="_blank"> {{$quiz->name}}
                            </a>
                        @endforeach
                    @endif

              
                </div>
            </div>
    </div>
    @include('includes.home_footer')
@endsection