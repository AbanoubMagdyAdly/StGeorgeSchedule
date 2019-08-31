@extends('layouts.app', ['title' => __('booking Management')])

@section('content')
    @include('users.partials.header', ['title' => __('الحجز')])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('الحجز') }}</h3>
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
                                    <th scope="col">{{ __('delete') }}</th>
                                    <th scope="col">{{ __('Approve') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bookings as $booking)
                                    <tr>
                                        <td>{{ $booking->room_id }}</td>
                                        <td>
                                           {{ $booking->user_id }}
                                        </td>
                                        <td>{{ $booking->from }}</td>
                                        <td>{{ $booking->to }}</td>
                                        <td>{{ $booking->day }}</td>
                                        <td>
                                            <form method="post" action="{{ route('schedule.delete' , $booking->id) }}">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger mt-4">{{ __('الغاء الحجز') }}</button>
                                            </form>
                                        </td>
                                        <td class="text-right">
                                            <form method="post" action="{{ route('schedule.approve') }}">
                                                    @csrf
                                                    <input name="id" value="{{$booking->id}}" hidden/>
                                                    @if($booking->is_approved )
                                                            <button type="submit" name="approve" value="0" class="btn btn-warning mt-4">{{ __('رفض') }}</button>
                                                    @else
                                                            <button type="submit" name="approve" value="1" class="btn btn-success mt-4">{{ __('قبول') }}</button>
                                                    @endif
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