<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use App\Models\Room;
use App\Mail\bookRoom;
use App\Mail\deleteBook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $bookings = DB::table('user_room')->where('day','>',Carbon::yesterday())->get();
        foreach ($bookings as  $booking) {
            $booking->user_id = User::find($booking->user_id)->name;
            $booking->room_id = Room::find($booking->room_id)->name;
        }
        
        return view('schedule',['bookings'=> $bookings]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showAll()
    {
        $bookings = DB::table('user_room')->where('day','>',Carbon::yesterday())->get();
        foreach ($bookings as  $booking) {
            $booking->user_id = User::find($booking->user_id)->name;
            $booking->room_id = Room::find($booking->room_id)->name;
        }
        
        return view('rooms.approve',['bookings'=> $bookings]);
    }

    public function find(Request $request)
    {
        $need_tv = $request->need_tv ? 1 : 0 ;
        $rooms = DB::table('user_room')->select('room_id')
        ->where([
            ['day','=', date("Y-m-d",strtotime($request->day))],
            ['to','>=',$request->from],
            ['from','<=',$request->to]
            ])->get();
            $rooms = $rooms->toArray();
            $bookedRooms = [];
            foreach ($rooms as $key => $value) {
                $bookedRooms[] = $value->room_id;
            }
        if(empty($rooms)){
            $availableRooms = Room::where('in_maintenance', 0)
            ->where('capacity','>=',$request->number)
            ->where('has_tv',$need_tv)->get();
        }else{
            $availableRooms = DB::table('rooms')
                    ->where('in_maintenance', 0)
                    ->whereNotIn('id',$bookedRooms)
                    ->where('capacity','>=',$request->number)
                    ->where('has_tv',$need_tv)->get();
        }
        return view('rooms.availableRooms', [
            'rooms'=> $availableRooms,
            'from' => $request->from,
            'to' => $request->to,
            'day' => $request->day,
            'meeting_name' => $request->meeting_name,
            'responsible_person' => $request->responsible_person
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::table('user_room')->insert([
            'room_id' => $request->room_id,
            'from' =>$request->from,
            'to' => $request->to,
            'day' => date("Y-m-d",strtotime($request->day)),
            'user_id' => Auth::user()->id,
            'meeting_name' => $request->meeting_name,
            'responsible_person' => $request->responsible_person
        ]);
        Mail::to(env('SEND_TO', 'abanoub.magdy.adly@gmail.com'))
                ->send(new bookRoom());

        return redirect()->route('schedule.index')->withStatus(__('schedule successfully created.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function approve(Request $request)
    {
        $res = DB::table('user_room')->where('id', $request->id)->update(['is_approved'=>$request->approve]);

        return redirect()->route('schedule.showall')->withStatus(__('schedule successfully created.'));
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
    public function destroy(Request $request,$id)
    {
        $query = DB::table('user_room')->where('id', $id);
        $book = $query->get();
        $user = User::find($book[0]->user_id);
        Mail::to($user->email)
                ->send(new deleteBook($book[0] , $request->reason));
        
        $query->delete();
        
        return redirect()->route('schedule.showall')->withStatus(__('schedule successfully deleted.'));

    }
}
