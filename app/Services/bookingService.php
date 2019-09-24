<?php

namespace App\Services;

use App\User;
use DateTime;
use Carbon\Carbon;
use App\Models\Room;
use App\Mail\bookRoom;
use App\Mail\deleteBook;
use App\Models\UserRoom;
use App\Mail\ApprovedBook;
use App\Models\UnBookReasons;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class BookingService
{

    public function bookRoom($data)
    {
        $data->repeat = $data->repeat ? 1 : 0;

        DB::table('user_room')->insert([
            'room_id' => $data->room_id,
            'from' => $data->from,
            'to' => $data->to,
            'day' => date("Y-m-d", strtotime($data->day)),
            'user_id' => Auth::user()->id,
            'meeting_name' => $data->meeting_name,
            'responsible_person' => $data->responsible_person,
            'repeating' => $data->repeat
        ]);
        Mail::to(env('ADMIN_EMAIL', 'antounyacob144@gmail.com'))
            ->cc(env('FR_EMAIL', 'youssef.zaki1986@gmail.com'))
            ->bcc(env('SUPER_ADMIN_EMAIL', 'abanoub.magdy.adly@gmail.com'))
            ->send(new bookRoom($data));
    }

    public function getAllBooking()
    {
        $bookings = UserRoom::where('day', '>', Carbon::today()->subWeek())
                    ->orWhere('repeating',1)->orderByRaw('day DESC')->get();
        foreach ($bookings as $booking) {
            $booking->user_id = User::find($booking->user_id)->name;
            $booking->room_id = Room::find($booking->room_id)->name;
        }

        return $bookings;
    }

    public function approveBooking($data)
    {
        $query = UserRoom::where('id', $data->id);
        $book = $query->get()[0];
        $query->update(['is_approved' => $data->approve]);
        if($data->approve === '1'){
            Mail::to(User::find($book->user_id)->email)
            ->bcc(env('SUPER_ADMIN_EMAIL', 'abanoub.magdy.adly@gmail.com'))
            ->send(new ApprovedBook($book));
        }

    }

    public function deleteBooking($data, $id)
    {

        $query = UserRoom::where('id', $id);
        $book = $query->get();
        $user = User::find($book[0]->user_id);

        Mail::to($user->email)
        ->bcc(env('SUPER_ADMIN_EMAIL', 'abanoub.magdy.adly@gmail.com'))
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
        $repeatedRooms = $this->getRepeatedBookings($data);

        $rooms = DB::table('user_room')->select('room_id')
            ->where([
                ['day', '=', date("Y-m-d", strtotime($data->day))],
                ['to', '>', $data->from],
                ['from', '<', $data->to],
            ])->get();
        $rooms = $rooms->toArray();

        $unAvailableRooms = array_merge($repeatedRooms, $rooms);

        $bookedRooms = [];
        foreach ($unAvailableRooms as $key => $value) {
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


    public function getUnBookReason(){
        $unBookings = UnBookReasons::where('day', '>',Carbon::today()->subWeek())
                        ->orderByRaw('day DESC')->paginate(5);
        foreach ($unBookings as $unBooking) {
            $unBooking->user_id = User::find($unBooking->user_id)->name;
            $unBooking->room_id = Room::find($unBooking->room_id)->name;
        }
        return $unBookings;
    }

    public function getRepeatedBookings($data){
        $d    = new DateTime($data->day);
        $d = $d->format('l');

        $rooms = DB::table('user_room')->select('room_id')
            ->where([
                [DB::raw('DAYNAME(day)'), $d],
                ['to', '>', $data->from],
                ['from', '<', $data->to],
                ['repeating', 1],
            ])->get();

        $rooms = $rooms->toArray();
        return $rooms;
    }


    public function getUserBookings()
    {
        $bookings = UserRoom::where([
            ['user_id', Auth::User()->id],
            ['day', '>', Carbon::today()->subWeek()]
            ])->orWhere('repeating',1)->orderByRaw('day DESC')->get();
            
        foreach ($bookings as $booking) {
            $booking->user_id = User::find($booking->user_id)->name;
            $booking->room_id = Room::find($booking->room_id)->name;
        }

        return $bookings;
    }

}
