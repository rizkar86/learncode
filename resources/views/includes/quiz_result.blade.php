<div class="container">
    <div class="card">
        <div class="card-header">
            Quiz Result
        </div>
        <div class="card-body">
            <h4>Your Score: {{ $score }}</h4>
            <h5>Correct Answers:</h5>
            @if (count($correctAnswers) > 0)
                <ul>
                    @foreach ($correctAnswers as $correctAnswer)
                        <li>Question : {{ $correctAnswer->title }} <span>(Score : {{$correctAnswer->score}})</span></li>
                        <p> Answers : {{ $correctAnswer->answers }}</p>
                        <p>Your Answer : {{ $correctAnswer->your_answer }}</p>
                        <p>Correct Answer : {{ $correctAnswer->right_answer }}</p>
                    @endforeach
                </ul>
            @else
                <p>No correct answers.</p>
            @endif

            <h5>Incorrect Answers:</h5>
            @if (count($incorrectAnswers) > 0)
                <ul>
                    @foreach ($incorrectAnswers as $incorrectAnswer)
                        <li>Question :  {{ $incorrectAnswer->title }} <span>(Score : {{$incorrectAnswer->score}})</span></li>
                        <p> Answers : {{ $incorrectAnswer->answers }}</p>
                        <p>Your Answer : {{ $incorrectAnswer->your_answer }}</p>
                        <p>Correct Answer : {{ $incorrectAnswer->right_answer }}</p>
                    @endforeach
                </ul>
            @else
                <p>No incorrect answers.</p>
            @endif
        </div>
    </div>
</div>