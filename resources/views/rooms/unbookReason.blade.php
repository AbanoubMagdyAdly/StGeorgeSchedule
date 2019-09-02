@extends('layouts.app', ['title' => __('booking Management')])

@section('content')
    @include('users.partials.header', ['title' => __('اسباب الغاء الحجزات')])
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('الاسباب') }}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">{{ __('room') }}</th>
                                    <th scope="col">{{ __('user') }}</th>
                                    <th scope="col">{{ __('from') }}</th>
                                    <th scope="col">{{ __('to') }}</th>
                                    <th scope="col">{{ __('day') }}</th>
                                    <th scope="col">{{ __('reason') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($unBookings as $unBooking)
                                    <tr>
                                        <td>{{ $unBooking->room_id }}</td>
                                        <td>
                                           {{ $unBooking->user_id }}
                                        </td>
                                        <td>{{ $unBooking->from }}</td>
                                        <td>{{ $unBooking->to }}</td>
                                        <td>{{ $unBooking->day }}</td>
                                        <td>{{ $unBooking->reason }}</td>
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
