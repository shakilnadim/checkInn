<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Place;
use App\Hotel;
use App\Custom\Files;
// use App\Http\Auth;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $places = Place::pluck('placeName', 'placeUrl')->all();
        return view('hotel.create')->with('places', $places);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'hotelName' => 'required',
            'place' => 'required',
            'hotelAddress' => 'required',
            'phone' => 'required|numeric',
            'aboutUs' => 'required',
            'coverPic' => 'required|image|mimes:jpeg,png,jpg,gif,svg'
        ]);

        //handle file upload
        if($request->hasFile('coverPic')){
            $files = new Files();
            $fileNameToStore = $files->fileUpload($request->file('coverPic'), 'public/hotels');
        }

        //storing data into database
        $hotel = new Hotel;
        $hotel->hotelName = $request->input('hotelName');
        $hotel->user_id = \Auth::user()->id;
        $hotel->place_placeUrl = $request->input('place');
        $hotel->hotelAddress = $request->input('hotelAddress');
        $hotel->phone = $request->input('phone');
        $hotel->aboutUs = $request->input('aboutUs');
        $hotel->coverPic = $fileNameToStore;
        $hotel->save();
        return redirect('hotel/create')->with('success', 'Hotel Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
