@extends('layouts.admin')

@section('dashboard-content')
    <div class="admin-heading pr-5 mb-4">
        <h1 class="text-red"><i class="fas fa-hotel"></i> Hotels</h1>
    </div>
    <div class="pr-5">
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">Hotel Id</th>
                <th scope="col">Name</th>
                <th scope="col">Phone</th>
                <th scope="col">Place</th>
                <th scope="col">Address</th>
                <th scope="col">Cover Pic</th>
                <th scope="col">Manager Id</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($hotels as $hotel)
                <tr>
                    <td>{{$hotel->id}}</td>
                    <td>{{$hotel->hotelName}}</td>
                    <td>{{$hotel->phone}}</td>
                    <td>{{$hotel->place->placeName}}</td>
                    <td>{{$hotel->hotelAddress}}</td>
                    <td><img src="/storage/hotels/{{$hotel->coverPic}}" alt=""></td>
                    <td>{{$hotel->user_id}}</td>
                    <td>
                        <a href="#" class="btn-outline-red mt-2 d-block">Delete</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
