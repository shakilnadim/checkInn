@extends('layouts.app')

@section('content')

    {{-- hero section --}}
    <section id="hero">
        <div class="d-flex flex-column justify-content-center text-white container">
            <h1>CheckInn</h1>
            <p>Now hotels are just one click away. Book your hotel and travel without worries.</p>
            <a href="#places"><i class="fas fa-arrow-right"></i> Book Now</a>
        </div>
    </section>

    {{-- places --}}
    <section id="places" class="py-5 bg-blue">
        <h2 class="text-center text-red mb-4">Places</h2>
        <div class="row mx-2">
            @if(count($places)>0)
                @foreach ($places as $place)
                    <div class="col-md-3 mt-4">
                        <a href="hotels/{{$place->placeUrl}}" class="">
                            <div class="card">
                                <img src="/storage/placesImg/{{$place->placeImg}}" class="card-img-top" alt="">
                                <div class="place-name">
                                    <h3 class="card-title ml-2">{{$place->placeName}}</h3>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            @endif            
        </div>
    </section>
@endsection