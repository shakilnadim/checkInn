<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Place;

class PlacesController extends Controller
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
        //
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
            $fullFileName = $request->file('placeImg')->getClientOriginalName();
            $fileName = pathinfo($fullFileName, PATHINFO_FILENAME);
            $extension = $request->file('placeImg')->getClientOriginalExtension();
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;

            $path = $request->file('placeImg')->storeAs('public/placesImg', $fileNameToStore);
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
