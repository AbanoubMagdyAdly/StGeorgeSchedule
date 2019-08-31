@extends('layouts.app') @section('content') @include('users.partials.header', [ 'title' => __('Hello') . ' '. auth()->user()->name, 'description' => __('This is your profile page. You can see the progress you\'ve made with your work and manage your projects
or assigned tasks'), 'class' => 'col-lg-7' ])
<div class="container-fluid mt--7">
    <div class="row">
        <div class="col-xl-12 order-xl-1">
            <div class="card bg-secondary shadow">
                <div class="card-body">
                    <form method="POST" action="{{route('schedule.secretarybooking')}}" id="form">
                        @csrf
                        <div class="form-group">
                            <h3 class="text-center"> اليوم </h3>
                            <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                </div>
                                <input class="form-control datepicker" placeholder="Select date" type="text"  name="day" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <h3 class="text-center"> من </h3>
                            <input type="time" class="form-control" value="08:30" step="600" name="from" required>
                        </div>
                        <div class="form-group">
                            <h3 class="text-center"> الى </h3>
                            <input type="time" class="form-control" value="09:30" step="600" name="to" required>
                        </div>
                        <div class="form-group{{ $errors->has('room') ? ' has-danger' : '' }}">
                            <h3 class="text-center"> القاعة </h3>
                            <select class="form-control" name="room_id">
                                    <option value="10">الاول الامير</option>
                                    <option value="19">الاول الروماني</option>
                                </select>
                            @if ($errors->has('room'))
                                <span class="invalid-feedback" room="alert">
                                    <strong>{{ $errors->first('room') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <h3 class="text-center"> اسم الخدمة </h3>
                            <input type="text" class="form-control"  name="meeting_name" required>
                        </div>
                        <div class="form-group">
                            <h3 class="text-center"> الشخص المسؤول </h3>
                            <input type="text" class="form-control" name="responsible_person" required>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-success mt-4">{{ __('احجز الان') }}</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>
@include('layouts.footers.auth')
</div>
@endsection @push('js')
<script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
<script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
<script src="{{ asset('argon') }}/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

@endpush