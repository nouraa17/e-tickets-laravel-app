@extends('layout')
@section('title','Tickets')
@section('content')
    <div class="container mb-5">
        @if($errors->any())
            @foreach($errors->all() as $error)
                <p class="alert alert-danger">{{$error}}</p>
            @endforeach
        @endif
        @if(session('success'))
            <p class="alert alert-success">{{session('success')}}</p>
        @endif
            @if(auth()->user()->type != 'admin')
                <a href="{{route('tickets.create')}}" class="btn btn-primary mb-3">Send Support ticket</a>
            @endif
            @if($tickets->isEmpty())
                <h2>You don't have any tickets</h2>
            @endif
        @foreach($tickets as $ticket)
            <div class="card mb-3">
                <div class="card-body">
                    <h3>{{ $ticket->title }}</h3>
                    <p>Type: {{ $ticket->type }}</p>
                    <p>Description: {{ $ticket->description }}</p>
                    <p>Created on: {{ $ticket->created_at ?? 'Created date missing' }}</p>
                    <p>Published: {{ $ticket->created_at ? $ticket->created_at->diffForHumans() : 'Published date not available' }}</p>
                    <a href="{{ route('tickets.details', $ticket->id) }}" class="btn btn-warning">Display ticket</a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
