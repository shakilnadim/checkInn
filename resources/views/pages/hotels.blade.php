@extends('layouts.app')

@section('content')
    <section class="mt-nav pt-5">
        @foreach ($hotels as $hotel)
            <h5>{{$hotel->hotelName}}</h5>
        @endforeach
    </section>
@endsection