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
            @isset($ticket)
                <div>
                    <h3>{{ $ticket->title }}</h3>
                    <p>Type: {{ $ticket->type }}</p>
                    <p>Description: {{ $ticket->description }}</p>
                    <p>Created on: {{ $ticket->created_at ?? 'Created date missing' }}</p>
                    <p>Published: {{ $ticket->created_at ? $ticket->created_at->diffForHumans() : 'Published date not available' }}</p>
                </div>
            @endisset

            @foreach($comments as $comment)
                <div class="card mb-2">
                    <div class="card-body">
                        <img class="img-fluid rounded-circle" src="{{ asset('images/default.png') }}" alt="Profile Image" style="width: 50px; height: 50px;">
                        <label><strong>Comment by: {{ $comment->user->name }}</strong></label>
                        <p>{{ $comment->comment }}</p>
                        <small>Posted: {{ $comment->created_at->diffForHumans() }}</small>
                    </div>
                </div>
            @endforeach

            @if($comments->isEmpty())
                <p>No comments found.</p>
            @endif

            <form action="{{ route('comments.store') }}" method="POST" class="card d-flex">
                @csrf
                <div class="">
                    <input type="hidden" name="ticket_id" value="{{ $ticket->id }}">
                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                    <textarea class="form-control position-relative" name="comment" placeholder="Add your comment here..." required>{{old('comment')}}</textarea>
                    <button class="btn btn-success position-absolute bottom-0 end-0" type="submit">Comment</button>
                </div>
            </form>
        </div>
    </div>
@endsection
