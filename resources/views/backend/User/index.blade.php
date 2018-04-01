@extends('layouts.app')
@section('content')

    <div class="container">
        <a href="{{ route('cms') }}" class="btn btn-primary mb-4"><i class="fa fa-arrow-left fa-lg"></i> Back to cms</a>
        <h1>Users</h1>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>name</th>
                    <th>Is Admin</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>@foreach($user->roles as $role) @if($role->id == 2) <i class="fa fa-check-square"></i> @break @endif @endforeach</td>
                        <td class="table-actions">
                            <a class="btn btn-sm btn-primary" href="{{route('users.edit', $user->id)}}">
                                Edit
                            </a>

                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>

        </div>

    </div>
@endsection