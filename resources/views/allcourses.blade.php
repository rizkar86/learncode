@extends('layouts.user_layout')
@section('content')
    @include('includes.home_haeder')
    <div class="row mt-4 mx-4">
        <div class="col-12">
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
                    <h6>Your Courses count is {{$courses->total()}} </h6>    
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    @if (count($courses) > 0)
                    <div class="row">
                        @foreach ($courses as $course)
                        <div class="col-sm-3 mb-4">
                            <div class="card" style="width: 18rem;"> 
                                <div class="card-header">
                                    <a class="mt-5" href="/tracks/{{$course->track->name}}"><h5> {{$course->track->name}}<h5></a>  
                                </div>
                                @if ($course->photo)
                                    <img height="159" width="319" src="{{asset('img/'.$course->photo->filename.'')}}" class="card-img-top" alt="...">
                                @else
                                    <img height="159" width="319" src="{{asset('img/1.jpg')}}" class="card-img-top" alt="image">
                                @endif
                                <div class="card-body">
                                    <h5 class="card-title">{{$course->title}}</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <div class="d-flex justify-content-between ">
                                        <a href="/courses/{{$course->slug}}" class="btn btn-info btn-sm me-1" >Show</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach   
                    </div>      
                    @else
                        <div>
                            <td colspan="4" class="text-center">No Courses Found</td>
                        </div>
                    @endif       
                </div>
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        {{ $courses->appends(request()->query())->links('custom-pagination') }}
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    @include('includes.home_footer')
@endsection