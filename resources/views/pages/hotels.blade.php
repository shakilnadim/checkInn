@extends('layouts.app')

@section('content')
    <section id="hotel-list" class="py-5 wrapper">
        <h1 class="text-red mb-3">{{$place->placeName}}</h1>
        @foreach ($place->hotels as $hotel)
            <a href="/hotel/{{$hotel->id}}">
                <img src="/storage/hotels/{{$hotel->coverPic}}" alt="">
                <div class="ml-2 mt-2">
                    <h2>{{$hotel->hotelName}}</h2>
                    <p>{{$hotel->hotelAddress}}</p>
                </div>
            </a>
        @endforeach
    </section>
@endsection
