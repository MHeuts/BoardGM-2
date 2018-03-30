@extends('layouts.app')
@section('content')
    <div class="container">
        <a href="{{ route('categories.index') }}" class="btn btn-primary"><i class="fa fa-arrow-left fa-lg"></i> Back to index</a>
        <form method="POST" action="{{ route('categories.store') }}">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="parrent">Parrent Category:</label>

                <select class="selectpicker"  name="parent">
                    <option value="0"></option>
                    @foreach($categories as $category)
                        <option value="{{$category->id}}"> {{$category->name}}</option>
                    @endforeach
                </select>

            </div>
            <button type="submit" class="btn btn-primary">save</button>
        </form>

    </div>
@endsection