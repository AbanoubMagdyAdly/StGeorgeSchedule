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
                                    <th scope="col">{{ __('القاعة') }}</th>
                                    <th scope="col">{{ __('امين الخدمة') }}</th>
                                    <th scope="col">{{ __('من') }}</th>
                                    <th scope="col">{{ __('الى') }}</th>
                                    <th scope="col">{{ __('اليوم') }}</th>
                                    <th scope="col">{{ __('الغاء') }}</th>
                                    <th scope="col">{{ __('موافقة') }}</th>
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
                                        <button type="button" class="btn btn-danger mt-4" data-toggle="modal" data-target="#exampleModal{{$booking->id}}">{{ __('الغاء الحجز') }}</button>
                                                <div class="modal fade" id="exampleModal{{$booking->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                          <div class="modal-content">
                                                            <div class="modal-header">
                                                              <h5 class="modal-title" id="exampleModalLabel">حذف الحجز </h5>
                                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                              </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                    <form method="post" action="{{ route('schedule.delete' , $booking->id) }}">
                                                                        @csrf
                                                                        @method('delete')
                                                                        <div class="form-group">
                                                                            <div class="input-group mb-4">
                                                                              <input class="form-control" placeholder="السبب" type="text" name="reason">
                                                                              <div class="input-group-append">
                                                                                <span class="input-group-text"><i class="ni ni-zoom-split-in"></i></span>
                                                                              </div>
                                                                            </div>
                                                                          </div>
                                                                          <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                                                                            <button type="submit" class="btn btn-danger">حذف</button>
                                                                          </div>
                                                                    </form>
                                                                </div>
                                                          </div>
                                                        </div>
                                                      </div>
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
                    {{-- <div class="card-footer py-4">
                        <nav class="d-flex justify-content-end" aria-label="...">
                            {{ $bookings->links() }}
                        </nav>
                    </div> --}}
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection
