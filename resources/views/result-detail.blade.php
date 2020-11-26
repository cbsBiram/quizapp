@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <center><h2>Your results</h2></center>

        @foreach ($results as $key=>$result)
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $key + 1 }}</div>
                    <div class="card-body">
                        <p>
                            <h3>{{ $result->question->question }}</h3>
                        </p>

                        @php
                            $i = 1;
                            $answers = DB::table('answers')->where('question_id', $result->question_id)->get();
                            foreach ($answers as $answer) {
                                echo '<p>'. $i++ . ')' . $answer->answer.
                                    '</p>';
                            }
                        @endphp

                        <p>
                            Your answer : {{ $result->answer->answer }}
                        </p>

                        @php
                            $correctAnswers = DB::table('answers')->where('question_id', $result->question_id)
                                ->where('is_correct', 1)->get();
                            foreach ($correctAnswers as $correctAnswer) {
                                echo 'Correct Answer :'. $correctAnswer->answer;
                            }
                        @endphp

                        @if ($result->answer->is_correct)
                            <p>
                                <span class="badge badge-success">
                                    Result:Correct
                                </span>
                            </p>  
                        @else  
                            <p>
                                <span class="badge badge-danger">
                                    Result:Incorrect
                                </span>
                            </p> 
                        @endif

                    </div>
                </div>
            </div>   
        @endforeach
    
    </div>
</div>
@endsection