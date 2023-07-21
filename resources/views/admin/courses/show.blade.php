@extends('layouts.app')

@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'Tracks Management'])
<div class="container-fluid py-4">
    @include('layouts.header.header')
    <div class="row mt-4 mx-4">
        <div class="col-12">
          {{--   <div class="alert alert-light" role="alert">
                This feature is available in <strong>Argon Dashboard 2 Pro Laravel</strong>. Check it
                <strong>
                    <a href="https://www.creative-tim.com/product/argon-dashboard-pro-laravel" target="_blank">
                        here
                    </a>
                </strong>
            </div> --}}
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
                <div class="card-header pb-0">
                    <h6>Courses</h6>
                    <a class="btn btn-primary btn-sm float-end" href="#" >Preview Course</a>
                     
                </div>
                
                <div class="card-body container px-0 pt-0 pb-2">
                        <div class="row">
                            <div class="col-6">
                                <div class="course-photo">
                                    @if ($course->photo)
                                    <img  src="{{asset('img/'.$course->photo->filename.'')}}" class="card-img-top" alt="...">
                                    @else
                                    <img  src="{{asset('img/1.jpg')}}" class="card-img-top" alt="image">
                                    @endif
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="course-info">
                                    <h3>{{$course->title}}</h3>
                                    <h5><a href="/admin/tracks/{{$course->track->id}}">{{$course->track->name}}</a><h5>
                                    <span>{{$course->status == 0 ? 'FREE' : 'PAID'}}</span>
                                </div>     
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div>
                                <p>Course Videos</h6>
                                    <a class="btn btn-primary btn-sm float-end " href="/admin/courses/{{$course->id}}/quizzes/create" >New Quiz</a>
                                <a class="btn btn-primary btn-sm float-end me-2" href="/admin/courses/{{$course->id}}/videos/create" >New Video</a>
                            </div>
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Title</th>
                                          
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Create Date</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($videos as $video)
                                        <tr>
                                            <td>
                                                <div class="d-flex px-3 py-1">
                                                    <div>
                                                        <img src="{{asset('img/team-1.jpg')}}" class="avatar me-3" alt="image">
                                                    </div>
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <a class="mb-0 text-sm" href="/admin/videos/{{$video->id}}">{{$video->title}}</a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <p class="text-sm font-weight-bold mb-0">{{$video->created_at}}</p>
                                            </td>
                                            <td class="align-middle text-end">
                                                <div class="d-flex px-3 py-1 justify-content-center align-items-center">
                                                    <a class="text-sm font-weight-bold mb-0" href="{{ route('courses.videos.edit',[ $course,$video]) }}">Edit</a>
                                                    <form action="{{ route('courses.videos.destroy',[ $course,$video]) }}" method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <input type="submit" class="btn btn-link text-sm font-weight-bold mb-0 ps-2" value="Delete">
                                                    </form> 
                                                  
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <nav aria-label="Page navigation example">
                                <ul class="pagination">
                                    {{ $videos->links('custom-pagination') }}
                                </ul>
                              </nav>
                        </div>
                    </div>
            </div>
        </div>
    </div>
@endsection

