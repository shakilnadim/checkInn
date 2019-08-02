@extends('layouts.app')

@section('content')

    <section id="add-place" class="mt-nav container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6 bg-white p-5">
                <h2 class="text-red text-center mb-4">Update User Role</h2>
                <p>Name: {{$user->name}}</p>
                <p>Id: {{$user->id}}</p>
                <p>Email: {{$user->email}}</p>
                @include('inc.messages')
                {{ Form::open(['action' => ['AdminController@updateRole', $user->id], 'method' => 'POST']) }}
                {{Form::text('_method', 'PUT', ['hidden'])}}
                <div class="form-group">
                    {{Form::select('role', ['user' => 'User', 'manager' => 'Manager', 'admin' => 'Admin'], $user->role, ['class' => 'form-control'])}}
                </div>
                <div class="form-group text-center">
                    {{Form::submit('Update Role', ['class' => 'btn-outline-red'])}}
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </section>

@endsection
