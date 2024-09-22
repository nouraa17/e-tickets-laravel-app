@extends('layout')
@section('title','Admin | Users')

@section('content')
    <div class="users_list">
        <div class="container">
            <h1 class="my-4">All Users</h1>
            @if($errors->any())
                @foreach($errors->all() as $error)
                    <p class="alert alert-danger">{{$error}}</p>
                @endforeach
            @endif
            @if(session('success'))
                <p class="alert alert-success">{{session('success')}}</p>
            @endif
            <table class="table table-bordered table-striped text-center">
                <thead class="thead-dark">
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Type</th>
                    <th>Control</th>
                </tr>
                </thead>
                <tbody>
                @if($users->isEmpty())
                    <tr>
                        <td colspan="8" class="text-center">No users found.</td>
                    </tr>
                @else
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->phone }}</td>
                            <td>{{ $user->type }}</td>
                            <td>
                                <a href="{{route('notifications.create.user',$user->id)}}" class="btn btn-primary">Notify</a>
                                <a href="{{ route('user.destroy', $user->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');">Delete</a>
                                <a href="{{ route('users.export.single', $user->id) }}" class="btn btn-success">Export PDF</a>

                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
            {{$users->links()}}
        </div>
    </div>
@endsection
