@extends('layouts.app')

@section('content')
    <section id="create-room" class="mt-nav pt-5 container">
        
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        {{ Form::open(['action' => 'RoomController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
                            <h2 class="text-center text-danger">Create New Room</h2>
                            <div class="form-group">
                                {{Form::label('roomType', 'Room Type')}}
                                {{Form::text('roomType', '', ['class' => 'form-control'])}}
                            </div>
                            <div class="form-group">
                                {{Form::label('capacity', 'Capacity')}}
                                {{Form::text('capacity', '', ['class' => 'form-control'])}}
                            </div>
                            <div class="form-group">
                                {{Form::label('price', 'Rent Amount')}}
                                {{Form::text('price', '', ['class' => 'form-control'])}}
                            </div>
                            <div class="form-group">
                                {{Form::label('roomDescription', 'Room Description')}}
                                {{Form::textarea('roomDescription', '', ['class' => 'form-control'])}}
                            </div>
                            <div class="form-group">
                                    {{Form::label('roomNo', 'Room Numbers')}}
                                    {{Form::text('roomNo', '', ['class' => 'form-control'])}}
                                    <small>Use , to separate room numbers e.g.(101,102)</small>
                                </div>
                            <div class="form-group">
                                {{Form::label('img', 'Room Picture')}}
                                {{Form::file('img')}}
                            </div>
                            <div class="form-group">
                                {{Form::submit('Create Rooms', ['class' => 'btn btn-danger'])}}
                            </div>
                        {{ Form::close() }}
                    </div>
                </div>
                
            </div>
        </div>
    </section>
@endsection