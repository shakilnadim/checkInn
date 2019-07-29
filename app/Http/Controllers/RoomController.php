<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RoomDetails;
use App\Room;
use App\Custom\Files;

class RoomController extends Controller
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
        return view('hotel.createRoom');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validating data
        $this->validate($request, [
            'roomType' => 'required',
            'capacity' => 'required',
            'price' => 'required|numeric',
            'roomDescription' => 'required',
            'roomNo' => 'required',
            'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg'
        ]);

        //handle file upload
        if($request->hasFile('img')){
            $files = new Files();
            $fileNameToStore = $files->fileUpload($request->file('img'), 'public/rooms');
        }

        //storing data into database
        $roomDetails = new RoomDetails;

        $roomDetails->hotel_id = \Auth::user()->hotel->id;
        $roomDetails->roomType = $request->input('roomType');
        $roomDetails->roomDescription = $request->input('roomDescription');
        $roomDetails->capacity = $request->input('capacity');
        $roomDetails->price = $request->input('price');
        $roomDetails->img = $fileNameToStore;

        $roomDetails->save();

        $rooms = explode(',', $request->input('roomNo'));
        foreach($rooms as $room){
            $roomNo = new Room;

            $roomNo->room_details_id = $roomDetails->id;
            $roomNo->roomNo = $room;

            $roomNo->save();
        }
        
        return redirect('room/create')->with('success', 'Rooms Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $room = RoomDetails::find($id);
        return view('hotel.singleRoom')->with('room', $room);
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
