@extends('layout')
@section('title','Notifications')
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
        @if($notifications->isEmpty())
            <h2>You don't have any notifications</h2>
        @endif
        @foreach($notifications as $notification)
            <div class="card mb-3">
                <div class="card-body d-flex position-relative">
                    <h3>{{ $notification->title }}</h3>
                    <a href="{{ route('notifications.show', $notification->id) }}" class="btn btn-warning position-absolute" style="right: 15px">Show details</a>

                </div>
            </div>
        @endforeach
    </div>
@endsection
