@extends('layouts.admin')

@section('dashboard-content')
    <div class="admin-heading pr-5 mb-4">
        <h1 class="text-red"><i class="fas fa-users"></i> Users</h1>
    </div>
    <div class="pr-5">
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">User Id</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">Role</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->phone}}</td>
                    <td>{{$user->role}}</td>
                    <td>
                        <a href="/users/edit/{{$user->id}}" class="btn-outline-blue d-inline-block">Edit</a>
{{--                        <a href="#" class="btn-outline-red">Delete</a>--}}
                        {{ Form::open(['action' => ['UserController@destroy', $user->id], 'method' => 'POST', 'class' => 'd-inline-block']) }}
                        {{Form::text('_method', 'DELETE', ['hidden'])}}
                        {{Form::submit('Delete', ['class' => 'btn-outline-red'])}}
                        {{ Form::close() }}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
