@extends('layouts.user_layout')
@section('content')
    @include('includes.home_haeder')
    <?php if(isset($score  )){ ?>
        @include('includes.quiz_result')
        <?php } ?>

    <div class="card-body container px-0 pt-0 pb-2 mt-5 ">
        <h2 class="mb-5">{{$quiz->name}} Quiz</h2>

   <form method="POST" action="/courses/{{$course->slug}}/quizzes/{{$quiz->name}}" >
    @csrf
        @foreach ($quiz->questions as $question)
        <div class="mt-3 border-bottom">
          <h5>{{$question->title}} ?       <span>(Score : {{$question->score}})</span></h5>
   
          @if ($question->type == 'text')
          <label  class="form-label">{{$question->answers}}</label>
                <input type="text" name="answer{{$question->id}}" class="form-control mb-4" > 
          @elseif($question->type == 'checkbox')
          <?php $answers = explode(',',$question->answers) ?>
            @foreach ($answers as $answer)
            <label  class="form-label">{{$answer}}</label>
                <input type="radio" class="form-check-input  mb-4" value="{{$answer}}"  name="answer{{$question->id}}" >
            @endforeach

          @endif


        </div>
        
        @endforeach
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>   
   </div>
    @include('includes.home_footer')
@endsection