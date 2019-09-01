<?php

namespace App\Http\Controllers;

use App\Mail\bookRoom;
use Illuminate\Http\Request;
use App\Services\BookingService;
use App\Http\Requests\FindAvailableRoomRequest;

class ScheduleController extends Controller
{
    public function __construct()
    {
        $this->bookingService = new BookingService;
    }

    public function index()
    {
        $bookings = $this->bookingService->getAllBooking();

        return view('schedule', ['bookings' => $bookings]);
    }

    public function showAll()
    {
        $bookings = $this->bookingService->getAllBooking();

        return view('rooms.approve', ['bookings' => $bookings]);
    }

    public function find(FindAvailableRoomRequest $request)
    {
        $bookedRooms = $this->bookingService->getBookedRoomsOnTime($request);

        $availableRooms = $this->bookingService->getAvailableRooms($request, $bookedRooms);

        return view('rooms.availableRooms', [
            'rooms' => $availableRooms,
            'from' => $request->from,
            'to' => $request->to,
            'day' => $request->day,
            'meeting_name' => $request->meeting_name,
            'responsible_person' => $request->responsible_person,
        ]);
    }

    public function store(Request $request)
    {     
        $this->bookingService->bookRoom($request);

        return redirect()->route('schedule.index')
        ->withStatus(__('schedule successfully created.'));
    }

    public function approve(Request $request)
    {
        $this->bookingService->approveBooking($request);

        return redirect()->route('schedule.showall')
        ->withStatus(__('schedule successfully created.'));
    }

    public function destroy(Request $request, $id)
    {
        $this->bookingService->deleteBooking($request, $id);

        return redirect()->route('schedule.showall')
        ->withStatus(__('schedule successfully deleted.'));

    }

    public function secretaryBooking(Request $request){

        $this->bookingService->secretaryBooking($request);

        return redirect()->route('schedule.index')
        ->withStatus(__('schedule successfully created.'));

    }

    public function secretaryBookingForm(){
        return view('secretaryBooking');
    }
}
