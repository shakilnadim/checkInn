<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Place;
use App\Custom\Files;

class PlacesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $places = Place::all();
        return view('admin/places')->with('places', $places);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.addPlace');
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
           'place' => 'required',
           'placeUrl' => 'required|unique:places',
           'placeImg' => 'required|image|mimes:jpeg,png,jpg,gif,svg'
       ]);

        //handle file upload
        if($request->hasFile('placeImg')){
            $files = new Files();
            $fileNameToStore = $files->fileUpload($request->file('placeImg'), 'public/placesImg');
        }

        //storing data into database
        $place = new Place;
        $place->placeName = $request->input('place');
        $place->placeUrl = $request->input('placeUrl');
        $place->placeImg = $fileNameToStore;
        $place->save();
        return redirect('admin')->with('success', 'New Place Added');
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
