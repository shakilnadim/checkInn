<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DateTime;
use App\Booking;
use App\RoomDetails;

class BookingController extends Controller
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
            'roomQty' => 'required|numeric',
            'startDate' => 'required',
            'endDate' => 'required'
        ]);


        $date = DateTime::createFromFormat('Y-m-d', $request->input('startDate'));
        $startDate = $date->format('Y-m-d H:i:s');
        $date = DateTime::createFromFormat('Y-m-d', $request->input('endDate'));
        $endDate = $date->format('Y-m-d H:i:s');


        $bookings = Booking::where('room_details_id', '=', $request->input('roomDetailsId'))
        ->where(function($query) use ($startDate, $endDate){
            $query->whereBetween('startDate', [$startDate, $endDate])
            ->orWhereBetween('endDate', [$startDate, $endDate])
            ->orWhere(function($query) use ($startDate, $endDate){
                $query->whereDate('startDate', '<', $startDate)
                ->whereDate('endDate', '>', $endDate);
            });
        })->get();

        $roomDetails = RoomDetails::find($request->input('roomDetailsId'));
        if (count($roomDetails->rooms) >= count($bookings)+$request->input('roomQty')){
            $booked = 0;
            foreach ($roomDetails->rooms as $room){
                $flag = 0;
                foreach ($bookings as $booking){
                    if ($room->id == $booking->room_id){
                        $flag = 1;
                        break;
                    }
                }
                if ($flag == 0){
                    $newBooking = new Booking;
                    $newBooking->user_id = \Auth::user()->id;
                    $newBooking->room_id = $room->id;
                    $newBooking->hotel_id = $roomDetails->hotel_id;
                    $newBooking->room_details_id = $request->input('roomDetailsId');
                    $newBooking->startDate = $startDate;
                    $newBooking->endDate = $endDate;
                    $newBooking->expense = $roomDetails->price;
                    $newBooking->save();
                    $booked++;
                    if ($booked == $request->input('roomQty')){
                        return 'booked';
                    }
                }
            }
           return 'not booked inside';
        }else{
            return 'not booked';
        }

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
