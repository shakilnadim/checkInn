@extends('layouts.app')

@section('content')
    <section id='hotel-create' class="container mt-nav pt-5">
        <h2 class="text-center text-danger">Create Hotel</h2>
        @include('inc.messages')
        <div class="row justify-content-center">
            <div class="col-md-6">
                    {{ Form::open(['action' => 'HotelController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
                    <div class="form-group">
                        {{Form::label('hotelName', 'Hotel Name')}}
                        {{Form::text('hotelName', '', ['class' => 'form-control'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('place', 'Hotel District')}}
                        {{Form::select('place', $places, null, ['class' => 'form-control', 'placeholder' => 'Select District'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('hotelAddress', 'Hotel Address')}}
                        {{Form::text('hotelAddress', '', ['class' => 'form-control'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('phone', 'Phone')}}
                        {{Form::text('phone', '', ['class' => 'form-control'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('aboutUs', 'About Us')}}
                        {{Form::textarea('aboutUs', '', ['class' => 'form-control'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('coverPic', 'Cover Picture')}}
                        {{Form::file('coverPic')}}
                    </div>
                    <div class="form-group">
                        {{Form::submit('Create Hotel', ['class' => 'btn btn-danger'])}}
                    </div>
                {{ Form::close() }}
            </div>
        </div>
    </section>    
@endsection