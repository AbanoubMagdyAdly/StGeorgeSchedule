<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $books = DB::table('user_room')->where('day','>',Carbon::yesterday())->get();
        foreach ($books as  $book) {
            $book->user_id = User::find($book->user_id)->name;
            $book->room_id = Room::find($book->room_id)->name;
        }
        
        return view('schedule',['books'=> $books]);
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

    public function find(Request $request)
    {
        $rooms = DB::table('user_room')
        ->where([
            ['day','=',$request->day],
            ['to','<',$request->to],
            ['from','>',$request->from]
            ])->get('room_id');
        if($rooms){
            return view('rooms.availableRooms', [
                'rooms'=> Room::all(),
                'from' => $request->from,
                'to' => $request->to,
                'day' => $request->day
            ]);
        }
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
        ]);

        return redirect()->route('schedule.index')->withStatus(__('schedule successfully created.'));
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
