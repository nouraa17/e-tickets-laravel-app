@extends('layout')
@section('title','Send Ticket')
@section('content')
    <div class="form-temp">
        <div class="container">
            @if($errors->any())
                @foreach($errors->all() as $error)
                    <p class="alert alert-danger">{{$error}}</p>
                @endforeach
            @endif
            @if(session('success'))
                <p class="alert alert-success">{{session('success')}}</p>
            @endif
            <form method="post" action="{{route('tickets.store')}}">
                @csrf
                <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                <div class="mb-3">
                    <label>Title</label>
                    <input class="form-control" name="title" value="{{old('title')}}" required>
                </div>
                <div class="mb-3">
                    <label>Type</label>
                    <select class="form-control" name="type" required>
                        <option value="request">Request</option>
                        <option value="problem">Problem</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label>Description</label>
                    <textarea class="form-control" name="description" required>{{old('description')}}</textarea>
                </div>
                <input type="submit" class="btn btn-success" value="Send">
            </form>
        </div>
    </div>

@endsection
