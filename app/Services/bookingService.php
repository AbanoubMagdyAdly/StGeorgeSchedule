<?php

namespace App\Services;

use App\User;
use Carbon\Carbon;
use App\Models\Room;
use App\Mail\bookRoom;
use App\Mail\deleteBook;
use App\Models\UnBookReasons;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class BookingService
{

    public function bookRoom($data)
    {
        DB::table('user_room')->insert([
            'room_id' => $data->room_id,
            'from' => $data->from,
            'to' => $data->to,
            'day' => date("Y-m-d", strtotime($data->day)),
            'user_id' => Auth::user()->id,
            'meeting_name' => $data->meeting_name,
            'responsible_person' => $data->responsible_person,
        ]);

        Mail::to(env('SEND_TO', 'abanoub.magdy.adly@gmail.com'))
            ->send(new bookRoom());

    }

    public function getAllBooking()
    {

        $bookings = DB::table('user_room')->where('day', '>', Carbon::yesterday())->get();
        foreach ($bookings as $booking) {
            $booking->user_id = User::find($booking->user_id)->name;
            $booking->room_id = Room::find($booking->room_id)->name;
        }

        return $bookings;

    }

    public function approveBooking($data)
    {

        DB::table('user_room')->where('id', $data->id)->update(['is_approved' => $data->approve]);

    }

    public function deleteBooking($data, $id)
    {

        $query = DB::table('user_room')->where('id', $id);
        $book = $query->get();
        $user = User::find($book[0]->user_id);

        Mail::to($user->email)
        ->send(new deleteBook($book[0], $data->reason));

        UnBookReasons::create([
            'room_id' => $book[0]->room_id,
            'from' => $book[0]->from,
            'to' => $book[0]->to,
            'day' => $book[0]->day,
            'user_id' => $book[0]->user_id,
            'reason' => $data->reason
        ]);
        
        $query->delete();

    }

    public function getBookedRoomsOnTime($data)
    {

        $rooms = DB::table('user_room')->select('room_id')
            ->where([
                ['day', '=', date("Y-m-d", strtotime($data->day))],
                ['to', '>=', $data->from],
                ['from', '<=', $data->to],
            ])->get();
        $rooms = $rooms->toArray();
        $bookedRooms = [];
        foreach ($rooms as $key => $value) {
            $bookedRooms[] = $value->room_id;
        }

        return $bookedRooms;
    }

    public function getAvailableRooms($data, $bookedRooms)
    {
        $need_tv = $data->need_tv ? 1 : 0;

        if (empty($bookedRooms)) {
            $availableRooms = Room::where('in_maintenance', 0)
                ->where('capacity', '>=', $data->number)
                ->where('has_tv', $need_tv)->get();
        } else {
            $availableRooms = DB::table('rooms')
                ->where('in_maintenance', 0)
                ->whereNotIn('id', $bookedRooms)
                ->where('capacity', '>=', $data->number)
                ->where('has_tv', $need_tv)->get();
        }

        return $availableRooms;
    }


    public function secretaryBooking($data){

        DB::table('user_room')->insert([
            'room_id' => $data->room_id,
            'from' => $data->from,
            'to' => $data->to,
            'day' => date("Y-m-d", strtotime($data->day)),
            'user_id' => Auth::user()->id,
            'meeting_name' => $data->meeting_name,
            'responsible_person' => $data->responsible_person,
            'is_approved'=> 1
        ]);

    }

}
