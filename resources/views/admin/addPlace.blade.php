@extends('layouts.app')

@section('content')

    <section id="add-place" class="mt-nav container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6 bg-white p-5">
                <h2 class="text-red text-center mb-4">Add a New Place</h2>
                @include('inc.messages')
                {{ Form::open(['action' => 'PlacesController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
                <div class="form-group">
                    {{Form::text('place', '', ['class' => 'form-control', 'placeholder' => 'Add Place'])}}
                </div>
                <div class="form-group">
                    {{Form::text('placeUrl', '', ['class' => 'form-control', 'placeholder' => 'Place Url'])}}
                </div>
                <div class="form-group">
                    {{Form::file('placeImg')}}
                </div>
                <div class="form-group text-center">
                    {{Form::submit('Add Place', ['class' => 'btn-outline-red'])}}
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </section>

@endsection
