@extends('layouts.app')
@section('content')
    <div class="container">
        <a href="{{ route('users.index') }}" class="btn btn-primary mb-4"><i class="fa fa-arrow-left fa-lg"></i> Back to index</a>
        <h1>Edit: </h1>
        <h2>{{$user->name}}</h2>
        <form method="POST" action="{{ route('users.update', $user->id) }}" id="userForm">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <div class="form-group">
                <label for="email">Name:</label>
                <input type="text" class="form-control" id="name" value="{{$user->name}}" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">E-Mail:</label>
                <input type="text" class="form-control" id="name" value="{{$user->email}}" name="email" required>
            </div>
            <div class="form-group">
                <label for="category">Roles:</label>

                <select class="selectpicker"  name="roles[]" multiple>
                    @foreach($roles as $role)
                        <option value="{{$role->id}}" @foreach($user->roles as $urole) @if($urole->id == $role->id) selected="selected" @break
                                @endif @endforeach> {{$role->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="street">Street:</label>
                <input type="text" class="form-control" id="street" value="{{$user->address->street}}" name="street" required>
            </div>
            <div class="form-group">
                <label for="number">Number:</label>
                <input type="text" class="form-control" id="number" value="{{$user->address->number}}" name="number" required>
            </div>
            <div class="form-group">
                <label for="zipcode">Zip-Code:</label>
                <input type="text" class="form-control" id="zipcode" value="{{$user->address->zipcode}}" name="zipcode" required>
            </div>
            <div class="form-group">
                <label for="city">City:</label>
                <input type="text" class="form-control" id="city" value="{{$user->address->city}}" name="city" required>
            </div>
        </form>
        <button type="submit" class="btn btn-primary" form="userForm">Save</button>
    </div>
@endsection