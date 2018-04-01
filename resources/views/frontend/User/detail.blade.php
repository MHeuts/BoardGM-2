@extends('layouts.app')
@section('content')
    <div class="container">
        <a href="{{ route('home.index') }}" class="btn btn-primary mb-4"><i class="fa fa-arrow-left fa-lg"></i>Exit</a>
        <h1>{{$user->name}}</h1>
        <button type="submit" class="btn btn-primary" form="userForm">Save</button>
    </div>
@endsection