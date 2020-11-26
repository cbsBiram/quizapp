@extends('backend.layouts.master')

    @section('title','assign quiz')

    @section('content')

    <div class="span9">
        <div class="content">
            @if(Session::has("message"))
                <div class="alert alert-success">{{ Session::get('message') }}</div>
            @endif
            <form action="{{ route('exam.assign') }}" method="POST">@csrf
                <div class="module">
                    <div class="module-head">
                        <h3>Assign Quiz</h3>
                    </div>
                    <div class="module-body">
                        <div class="control-group">
                            <label class="control-label">Select Quiz</label>
                            <div class="controls">
                                <select name="quiz_id" class="span8">
                                    @foreach(App\Models\Quiz::all() as $quiz) 
                                        <option value="{{ $quiz->id }}">{{ $quiz->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('quiz_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            
                        </div>
                        
                        <div class="control-group">
                            <label class="control-label">Select Quiz</label>
                            <div class="controls">
                                <select name="user_id" class="span8 @error('user_id') border-red @enderror">
                                    @foreach(App\Models\User::where('is_admin', '0')->get() as $user) 
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('user')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            
                        </div>

                        <div class="control-group">
                            <div class="controls">
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    @endsection