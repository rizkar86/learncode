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
                    <h6>Track</h6>
                    <a class="btn btn-primary btn-sm float-end" href="#" >Preview Track</a>
                     
                </div>
                
                <div class="card-body container px-0 pt-0 pb-2">
                        <div class="row">
                        
                            <div class="col-6">
                                <div class="course-info">
                                    <h3>{{$track->title}}</h3>
                                </div>     
                            </div>
                        </div>
                        <div class="row mt-5">
                         
                         
                            <div class="card mb-4">
                                <div class="card-header pb-0">
                                    <h6>Track Courses</h6>
                        
                                    <a class="btn btn-primary btn-sm float-end" href="/admin/tracks/{{$track->id}}/courses/create" >New Course</a>
                                     
                                </div>
                                <div class="card-body px-0 pt-0 pb-2">
                                        @if (count($courses) > 0)
                                        <div class="row">
                                            @foreach ($courses as $course)
                                            <div class="col-sm-3 mb-4">
                                                <div class="card" style="width: 20rem;">
                                                    @if ($course->photo)
                                                    <img height="159" width="319" src="{{asset('img/'.$course->photo->filename.'')}}" class="card-img-top" alt="...">
                                                    @else
                                                    <img height="159" width="319" src="{{asset('img/1.jpg')}}" class="card-img-top" alt="image">
                                                    @endif
                                                    <div class="card-body">
                                                    <h5 class="card-title">{{$course->title}}</h5>
                                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                                    <div class="d-flex justify-content-between ">
                
                                                    <a href="{{ route('tracks.courses.edit', [$track,$course]) }}" class="btn btn-primary btn-sm me-1" >edit</a>
                                                    <a href="{{ route('courses.show', $course->id) }}" class="btn btn-info btn-sm me-1" >Show</a>
                                                    <form action="{{ route('tracks.courses.destroy', [$track,$course]) }}" method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <input type="submit" class="btn btn-danger btn-sm me-1"  value="Delete">
                                                    </form> 
                                            
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach   
                                        </div>      
                                        @else
                                            <div>
                                                <td colspan="4" class="text-center">No Tracks Found</td>
                                            </div>
                                        @endif
                                       
                                   
                                </div>
                            
                                  <nav aria-label="Page navigation example">
                                    <ul class="pagination">
                                        {{ $courses->links('custom-pagination') }}
                                    </ul>
                                  </nav>
                            </div>
                            <nav aria-label="Page navigation example">
                                <ul class="pagination">
                                    {{ $courses->links('custom-pagination') }}
                                </ul>
                              </nav>
                        </div>
                    </div>
            </div>
        </div>
    </div>
@endsection

