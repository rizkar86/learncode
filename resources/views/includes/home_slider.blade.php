

@if($user_courses->count() > 0)
<div class="container-fluid bg-light ">
	<div class="row">
		<div class="col-md-12 p-5">
			<a href="#"><h1 class="text-center " style="color:#1c5996">My Course</h1></a>	
			<div class="tarkikComandSlider">
				@foreach ($user_courses as $course)
				
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
	</div>
</div>
@endif