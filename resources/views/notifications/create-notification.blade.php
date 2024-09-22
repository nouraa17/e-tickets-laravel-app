@extends('layout')
@section('title', 'Send Notification')

@section('content')
    <div class="container">
        @if($errors->any())
            @foreach($errors->all() as $error)
                <p class="alert alert-danger">{{$error}}</p>
            @endforeach
        @endif
        @if(session('success'))
            <p class="alert alert-success">{{session('success')}}</p>
        @endif
        <h1 class="my-4">Send Notification to {{ $user->name }}</h1>
        <form action="{{ route('notifications.store') }}" method="POST">
            @csrf
            <input type="hidden" name="user_id" value="{{ $user->id }}">
            <div class="form-group mb-3">
                <label>Title</label>
                <input class="form-control" name="title" required>
            </div>
            <div class="form-group mb-3">
                <label>Message</label>
                <textarea class="form-control" name="description" rows="3" required></textarea>
            </div>
            <button type="submit" class="btn btn-success">Send Notification</button>
            <a href="{{ route('users.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection
