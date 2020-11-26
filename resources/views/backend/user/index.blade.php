@extends('backend.layouts.master')

    @section('title','list users')

    @section('content')

    <div class="span9">
        <div class="content">

            @if(Session::has("message"))
                <div class="alert alert-success">{{ Session::get('message') }}</div>
            @endif

            <div class="module">
                <div class="module-head">
                    <h3>All Users</h3>
                </div>

                <div class="module-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Password</th>
                                <th>Occupation</th>
                                <th>Address</th>
                                <th>Phone</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($users)>0)

                                @foreach ($users as $key => $user)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->visible_password }}</td>
                                        <td>{{ $user->occupation }}</td>
                                        <td>{{ $user->address }}</td>
                                        <td>{{ $user->phone }}</td>
                                        <td>
                                            <a class="btn btn-primary" href="{{route('user.edit', [$user->id])}}">Edit</a>
                                        </td>
                                        <td>
                                            <form id="delete-form{{ $user->id }}"
                                                method="POST"
                                                action="{{route('user.destroy', [$user->id])}}"
                                                style="display: none;"    
                                            >@csrf
                                                {{ method_field('DELETE') }}
                                            
                                            </form>    
                                            <a href="#"
                                                onclick="if(confirm('Do you want to delete?')) {
                                                    event.preventDefault();
                                                    document.getElementById('delete-form{{$user->id}}').submit()
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
                                <td>No users to display</td>
                            @endif
                        </tbody>
                    </table>
                    <div class="pagination pagination-centered">
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
                		
        </div>
           			 
    </div>
</div> 


@endsection