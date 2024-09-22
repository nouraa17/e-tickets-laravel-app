@extends('layout')
@section('title','Ticket')
@section('content')
    <div class="container card mb-5">
        <div class="card-body">
            @if($errors->any())
                @foreach($errors->all() as $error)
                    <p class="alert alert-danger">{{$error}}</p>
                @endforeach
            @endif
            @if(session('success'))
                <p class="alert alert-success">{{session('success')}}</p>
            @endif
            @isset($notification)
                <div>
                    <h3>{{ $notification->title }}</h3>
                    <p>Description: {{ $notification->description }}</p>
                    <p>Created on: {{ $notification->created_at ?? 'Created date missing' }}</p>
                    <p>Received: {{ $notification->created_at ? $notification->created_at->diffForHumans() : 'Published date not available' }}</p>
                </div>
            @endisset
        </div>
    </div>
@endsection
