@extends('layouts.admin')

@section('dashboard-content')
    <div class="admin-heading pr-5 mb-4">
        <h1 class="text-red"><i class="fas fa-map-marked-alt"></i> Places</h1>
        <div class="ml-auto">
            <a href="/places/create" class="btn-outline-blue">Add New Place</a>
        </div>
    </div>
    <div class="pr-5">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">SL</th>
                    <th scope="col">Place Name</th>
                    <th scope="col">Url Name</th>
                    <th scope="col">Place Img</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
            <?php $i=1; ?>
                @foreach($places as $place)
                    <tr>
                        <td>{{$i}}</td>
                        <td>{{$place->placeName}}</td>
                        <td>{{$place->placeUrl}}</td>
                        <td><img src="/storage/placesImg/{{$place->placeImg}}" alt=""></td>
                        <td>
                            <a href="#" class="btn-outline-blue">Edit</a>
                            <a href="#" class="btn-outline-red">Delete</a>
                        </td>
                    </tr>
                    <?php $i++; ?>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
