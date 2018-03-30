@extends('layouts.app')
@section('content')
    <div class="container">
        <a href="{{ route('categories.index') }}" class="btn btn-primary"><i class="fa fa-arrow-left fa-lg"></i> Back to index</a>
        <h1>Edit: </h1>
        <h2>{{$category->name}}</h2>
        <form method="POST" action="{{ route('categories.update', $category->id) }}">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" value="{{$category->name}}" required>
            </div>
            <div class="form-group">
                <label for="parrent">Parrent Category:</label>

                <select class="selectpicker"  name="parent">
                    <option value="0"></option>
                    @foreach($categories as $pcategory)
                        <option value="{{$pcategory->id}}" @if($pcategory->id == $category->parent_id) selected="selected" @endif> {{$pcategory->name}}</option>
                    @endforeach
                </select>

            </div>
            <button type="submit" class="btn btn-primary">save</button>
        </form>
    </div>
@endsection