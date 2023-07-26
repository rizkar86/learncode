<div class="container py-5">
    <h2 class="text-center mb-5">Famous Course</h2>
    <div class="row">
     
           <?php $i = 0; ?>
            @foreach ($tracks as $track)
               <h3>{{$track->name}}</h3>
               @foreach ($track->courses()->limit(4)->get() as $course)
          
                    <div class="col-sm-3 px-5 my-5">
                        <div class="card " style="width: 20rem;">
                            @if ($course->photo)
                            <a href="/courses/{{$course->slug}}"><img height="159" width="319" src="{{asset('img/'.$course->photo->filename.'')}}" class="card-img-top" alt="..."></a>
                            @else
                            <a href="/courses/{{$course->slug}}"><img height="159" width="319" src="{{asset('img/1.jpg')}}" class="card-img-top" alt="image"></a>
                            @endif
                            <div class="card-body">
                                <h5 class="card-title text-center">{{$course->title}}</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            </div>
                            <div class="card-footer bg-transparent ">
                                <span class="card-text ">
                                    @if ($course->status == 0)
                                    <small class="text-success fw-bold" >FREE</small>
                                    <span class="card-text float-end "><small class="text-success fw-bold">{{count( $course->users)}} Users</small></span>
                                    @else
                                    <small class="text-danger fw-bold">PAID</small>
                                    <span class="card-text float-end "><small class="text-danger fw-bold">{{count( $course->users)}} Users</small></span>
                                    @endif
                                </span>
                              
                            </div>
                        </div>
                    </div>
                   
                 
                    @endforeach
                    @if ($i == 1)
                        <h3>Famues Tracks</h3>
                        <ul class="list-group list-group-horizontal row my-5 ">
                            @foreach ($famous_tracks as $track)
                            <li class="list-group-item  border col-sm-2 bg-secondary text-center  mb-1 mx-1">
                                <a href="/tracks/{{$track->name}}" class="text-white">{{$track->name}}</a>
                            </li>
                        @endforeach 
                        </ul>
                        @auth
                        @if($recommended_courses->count() > 0)
                        <h3>Recommended  Course</h3>
                        
                       
                            <div class="col-md-12 p-5">
                                
                                <div class="tarkikComandSlider1">
                                    @foreach ($recommended_courses as $course)
                                    
                                        <div class="card me-2" style="width: 20rem;">
                                            @if ($course->photo)
                                            <a href="/courses/{{$course->slug}}"><img height="159" width="319" src="{{asset('img/'.$course->photo->filename.'')}}" class="card-img-top" alt="..."></a>
                                            @else
                                            <a href="/courses/{{$course->slug}}"><img height="159" width="319" src="{{asset('img/1.jpg')}}" class="card-img-top" alt="image"></a>
                                            @endif
                                            <div class="card-body text-center">
                                                <h5 class="card-title">{{$course->title}}</h5>
                                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                            
                                            </div>
                                            <div class="card-footer bg-transparent ">
                                                <span class="card-text ">
                                                    {{$course->track->name}}
                                                </span>
                                            </div>
                                        </div>
                                    
                                    @endforeach   
                                </div>
                            </div>
                            @endif
                            @endauth
                        
                       
                    @endif
                <?php $i++; ?>
        @endforeach 
     
  
        
    </div>
</div>