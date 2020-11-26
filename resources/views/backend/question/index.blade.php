@extends('backend.layouts.master')

    @section('title','list questions')

    @section('content')

    <div class="span9">
        <div class="content">
            @if(Session::has("message"))
                <div class="alert alert-success">{{ Session::get('message') }}</div>
            @endif
            <div class="module">
                <div class="module-head">
                    <h3>All Questions</h3>
                </div>

                <div class="module-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Question</th>
                                <th>Quiz</th>
                                <th>Created</th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($questions)>0)

                                @foreach ($questions as $key => $question)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $question->question }}</td>
                                        <td>{{ $question->quiz->name }}</td>
                                        <td>{{date('F,d,Y', strtotime($question->created_at))}}</td>
                                        <td>
                                            <a href="{{route('question.show', [$question->id]) }}">
                                                <button class="btn btn-info">View</button>
                                            </a>
                                        </td>
                                        <td>
                                            <a class="btn btn-primary" href="{{route('question.edit', [$question->id])}}">Edit</a>
                                        </td>
                                        <td>
                                            <form id="delete-form{{$question->id}}"
                                                method="POST"
                                                action="{{route('question.destroy', [$question->id])}}"
                                                style="display: none;"    
                                            >@csrf
                                                {{ method_field('DELETE') }}
                                            
                                            </form>    
                                            <a href="#"
                                                onclick="if(confirm('Do you want to delete?')) {
                                                    event.preventDefault();
                                                    document.getElementById('delete-form{{$question->id}}').submit()
                                                    } else {
                                                        e.preventDefault();
                                                    }
                                                "
                                            >
                                                <input type="submit" class="btn btn-danger" value="Delete">
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach

                            @else 
                                <td>No questions to display</td>
                            @endif
                        </tbody>
                    </table>
                    <div class="pagination pagination-centered">
                        {{ $questions->links() }}
                    </div>
                </div>
            </div>
                		
        </div>
           			 
    </div>
</div> 


@endsection