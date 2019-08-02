@extends('layouts.app')

@section('content')
<section class="mt-nav">
    <section id="cover-pic" class="mt-nav">
        <img src="/storage/rooms/{{$room->img}}" alt="">
        <div class="hotel-name">
            <h2>{{$room->roomType}}</h2>
        </div>
    </section>

    {{-- booking section --}}
    <section id="booking" class="py-5">
        <div class="row justify-content-center">
            <div class="col-md-6 p-4">
                <h2 class="text-center text-red mb-3">Book Now</h2>
                {{ Form::open(['action' => 'BookingController@store', 'method' => 'POST']) }}
                <div class="row">
                    {{Form::text('roomDetailsId', $room->id, ['class' => 'form-control', 'hidden'])}}
                    <div class="form-group col-md-4">
                        {{Form::label('roomQty', 'Number of Rooms')}}
                        {{Form::text('roomQty', '1', ['class' => 'form-control', 'required'])}}
                    </div>
                    <div class="form-group col-md-4">
                        {{Form::label('startDate', 'Start Date')}}
                        {{Form::date('startDate', \Carbon\Carbon::now(), ['class' => 'form-control'])}}
                    </div>
                    <div class="form-group col-md-4">
                        {{Form::label('endDate', 'End Date')}}
                        {{Form::date('endDate', date('Y-m-d'), ['class' => 'form-control'])}}
                    </div>
                    <div class="col text-center">
                        <div class="form-group">
                            {{Form::submit('Book Now', ['class' => 'btn btn-danger'])}}
                        </div>
                    </div>
                    
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </section>
    
</section>
@endsection