@extends('layouts.app')

@section('content')
    <section id="cover-pic" class="mt-nav">
        <img src="/storage/hotels/{{$hotel->coverPic}}" alt="">
        <div class="hotel-name">
            <h2>{{$hotel->hotelName}}</h2>
        </div>
    </section>
    <section id="hotel-details" class="py-5">
        
        <div class="row">
            <div class="col-md-9 p-4">
                
            </div>
            <div class="col-md-3">
                <div class="p-4 mb-2">
                    <h3 class="text-blue">About Us</h3>
                    <p>{!! nl2br(e( $hotel->aboutUs)) !!}</p>
                    <a href="#">Read More</a>
                </div>
                <div class="p-4">
                    <h3 class="text-blue">Contact</h3>
                    <p>Address: {{$hotel->hotelAddress}}</p>
                    <p>Phone: {{$hotel->phone}}</p>
                </div>
                @if($hotel->id == $hotel->user_id)
                    <div class="d-flex mt-3">
                        <a href="#" class="btn btn-danger">Edit Hotel Details</a>
                        <a href="/room/create" class="btn btn-danger ml-1">Add New Rooms</a>
                    </div>
                @endif
            </div>
        </div>
    </section>

    <section id="room-types" class="bg-blue py-5">
        <h2 class="text-center text-red mb-4">Rooms</h2>
        <div class="row mx-2">
            @if(count($hotel->roomDetails)>0)
                @foreach ($hotel->roomDetails as $roomDetails)
                    <div class="col-md-3 mt-4">
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
    </section>
@endsection