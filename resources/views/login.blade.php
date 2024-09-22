@extends('layout')
@section('title','Login')
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
            <form method="post" action="{{route('auth.login')}}">
                @csrf
                <div class="mb-3">
                    <label>Phone</label>
                    <input class="form-control" name="phone" value="{{old('phone')}}">
                </div>
                <div class="mb-3">
                    <label>Password</label>
                    <input class="form-control" type="password" name="password" value="{{old('password')}}">
                </div>
                <input type="submit" class="btn btn-success" value="Login">
            </form>
        </div>
    </div>
@endsection
