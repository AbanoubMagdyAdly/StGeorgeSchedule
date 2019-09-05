@extends('layouts.app', ['title' => __('room Management')])

@section('content')
    @include('users.partials.header', ['title' => __('Rooms')])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('rooms') }}</h3>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-12">
                        @if (session('status'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('status') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        @if (empty($rooms[0]))
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            لا توجد قاعات فى هذا الميعاد
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    </div>

                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">{{ __('Name') }}</th>
                                    <th scope="col">{{ __('building') }}</th>
                                    <th scope="col">{{ __('capacity') }}</th>
                                    <th scope="col">{{ __('has tv') }}</th>
                                    <th scope="col">{{ __('has air conditioner') }}</th>
                                    <th scope="col">{{ __('Book') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($rooms as $room)
                                    <tr>
                                        <td>{{ $room->name }}</td>
                                        <td>
                                           {{ $room->building }}
                                        </td>
                                        <td>{{ $room->capacity }}</td>
                                        <td>{{ $room->has_tv }}</td>
                                        <td>{{ $room->has_air_conditioner }}</td>
                                        <td class="text-right">
                                            <form action="{{ route('schedule.store') }}" method="post">
                                                @csrf
                                                <input name="room_id" value={{ $room->id }} hidden>
                                                <input name="from" value={{ $from }} hidden>
                                                <input name="to" value={{ $to }} hidden>
                                                <input name="day" value={{ $day }} hidden>
                                                <input name="meeting_name" value='{{ $meeting_name }}' hidden>
                                                <input name="responsible_person" value='{{ $responsible_person }}' hidden>
                                                <input name="repeat" value='{{ $repeat }}' hidden>
                                                <button type="submit" class="btn btn-success">
                                                    {{ __('احجز الان') }}
                                                </button>
                                            </form>    
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
            
        @include('layouts.footers.auth')
    </div>
@endsection