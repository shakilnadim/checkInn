@extends('layouts.app')

@section('content')

    <section class="mt-nav container pt-5">
        
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
            <div class="form-group">
                {{Form::submit('Add Place', ['class' => 'btn btn-danger'])}}
            </div>
        {{ Form::close() }}

        
    </section>
    
@endsection
