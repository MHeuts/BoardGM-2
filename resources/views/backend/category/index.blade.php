@extends('layouts.app')
@section('content')

    <div class="container">
        <h1>Categories</h1>
        <a class="btn btn-primary pull-right" href="{{ route('categories.create') }}">
            Add new Category
        </a>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Parrent ID</th>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>{{$category->id}}</td>
                        <td>{{$category->parent_id}}</td>
                        <td>{{$category->name}}</td>
                        <td class="table-actions">
                            <a class="btn btn-sm btn-primary" href="{{route('categories.edit', $category->id)}}">
                                Edit
                            </a>

                        </td>
                        <td>
                            <form class="table-action" method="post" action="{{ route('categories.destroy', $category->id) }}">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <input role="button" class="btn btn-sm btn-danger table-action" type="submit" value="Delete">
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>

        </div>

    </div>
@endsection