@extends('layouts.app')

@section('content')
<section class="mt-nav">
    <section id="cover-pic" class="mt-nav">
        <img src="/storage/rooms/{{$room->img}}" alt="">
        <div class="hotel-name">
            <h2>{{$room->roomType}}</h2>
        </div>
    </section>



</section>
@endsection
