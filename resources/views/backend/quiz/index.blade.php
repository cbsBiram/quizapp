@extends('backend.layouts.master')

    @section('title','list quizzes')

    @section('content')

    <div class="span9">
        <div class="content">
            @if(Session::has("message"))
                <div class="alert alert-success">{{ Session::get('message') }}</div>
            @endif
            <div class="module">
                <div class="module-head">
                    <h3>All Quiz</h3>
                </div>

                <div class="module-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Minutes</th>
                                <th>Edit</th>
                                <th></th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($quizzes)>0)

                                @foreach ($quizzes as $key=>$quiz)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $quiz->name }}</td>
                                    <td>{{ $quiz->description }}</td>
                                    <td>{{ $quiz->minutes }}</td>
                                    <td>
                                        <a href="{{ route('quiz.questions', [$quiz->id]) }}"
                                            class="btn btn-inverse"
                                        >
                                            View Questions
                                        </a>
                                    </td>
                                    <td>
                                        <a class="btn btn-primary" href="{{route('quiz.edit', [$quiz->id])}}">Edit</a>
                                    </td>
                                    <td>
                                        <form id="delete-form{{$quiz->id}}"
                                            method="POST"
                                            action="{{route('quiz.destroy', [$quiz->id])}}"    
                                        >@csrf
                                            {{ method_field('DELETE') }}
                                            <a href="#"
                                                onclick="if(confirm('Do you want to delete?')) {
                                                    e.preventDefault();
                                                    document.getElementById('delete-form{{$quiz->id}}').submit()
                                                    } else {
                                                        e.preventDefault();
                                                    }
                                                "
                                            >
                                                <input type="submit" class="btn btn-danger" value="Delete">
                                            </a>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach

                            @else 
                                <td>No quiz to display</td>
                            @endif
                        </tbody>
					</table>
                </div>
            </div>
                		
        </div>
           			 
    </div>
</div> 


@endsection