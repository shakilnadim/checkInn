@extends('layouts.app')

@section('content')
    <section id="cover-pic" class="mt-nav">
        <img src="/storage/hotels/{{$hotel->coverPic}}" alt="">
        <div class="hotel-name">
            <h2>{{$hotel->hotelName}}</h2>
        </div>
    </section>
    <section id="hotel-details" class="py-5">
        {{-- booking section --}}
        <section id="booking" class="py-5">
            <div class="row justify-content-center">
                <div class="col-md-8 p-4">
                    @include('inc.messages')
                    <h2 class="text-center text-red mb-3">Book Now</h2>
                    {{ Form::open(['action' => 'BookingController@store', 'method' => 'POST']) }}
                    <div class="row">
                        <div class="form-group col-md-3">
                            {{Form::label('roomType', 'Room Type')}}
                            {{Form::select('roomType', $hotel['roomTypes'], null, ['class' => 'form-control', 'placeholder' => 'Select Room Type'])}}
                        </div>
                        <div class="form-group col-md-3">
                            {{Form::label('roomQty', 'Number of Rooms')}}
                            {{Form::text('roomQty', '1', ['class' => 'form-control', 'required'])}}
                        </div>
                        <div class="form-group col-md-3">
                            {{Form::label('startDate', 'Checkin Date')}}
                            {{Form::date('startDate', \Carbon\Carbon::now(), ['class' => 'form-control'])}}
                        </div>
                        <div class="form-group col-md-3">
                            {{Form::label('endDate', 'Checkout Date')}}
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

        <div class="row">
            <div id="room-types" class="col-md-9">
                <h2 class="text-center text-red mb-4">Rooms</h2>
                <div class="row mx-2">
                    @if(count($hotel->roomDetails)>0)
                        @foreach ($hotel->roomDetails as $roomDetails)
                            <div class="col-md-4 mt-4">
                                <a href="/room/{{$roomDetails->id}}" class="">
                                    <div class="card">
                                        <img src="/storage/rooms/{{$roomDetails->img}}" class="card-img-top" alt="">
                                        <div class="place-name">
                                            <h3 class="card-title ml-2">{{$roomDetails->roomType}}</h3>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
            <div class="col-md-3 text-white">
                <div class="p-4 mb-2 mr-3">
                    <h3 class="text-white">About Us</h3>
                    <p>{!! nl2br(e( $hotel->aboutUs)) !!}</p>
                    <a href="#" class="text-red">Read More</a>
                </div>
                <div class="p-4 mr-3">
                    <h3 class="text-white">Contact</h3>
                    <p>Address: {{$hotel->hotelAddress}}</p>
                    <p>Phone: {{$hotel->phone}}</p>
                </div>
                @if(Auth::user())
                    @if(Auth::user()->id == $hotel->user_id)
                        <div class="d-flex mt-3">
                            <a href="#" class="btn btn-danger">Edit Hotel Details</a>
                            <a href="/room/create" class="btn btn-danger ml-1">Add New Rooms</a>
                        </div>
                    @endif
                @endif
            </div>
        </div>
    </section>

    <div  class="py-5">

    </div>
@endsection
