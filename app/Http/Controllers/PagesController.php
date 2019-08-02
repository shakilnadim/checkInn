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
        $place = Place::find($placeUrl);
        return view('pages.hotels')->with('place', $place);
    }
}
