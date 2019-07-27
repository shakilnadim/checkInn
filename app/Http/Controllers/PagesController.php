<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Place;

class PagesController extends Controller
{
    public function index(){
        $places = Place::orderBy('created_at', 'asc')->get();
        return view('pages.index')->with('places', $places);
    }

    public function showHotels($placeUrl){
        $hotels = Place::find($placeUrl)->hotels;
        return view('pages.hotels')->with('hotels', $hotels);
    }
}
