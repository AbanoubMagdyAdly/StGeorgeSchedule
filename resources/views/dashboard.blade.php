@extends('layouts.app') @section('content') @include('users.partials.header', [ 'title' => __('مرحباً') . ' '. auth()->user()->name, 'description' => __('هذه الصفحة تمنحك البحث عن القاعة المناسبة لخدمتك'), 'class' => 'col-lg-12' ])

<div class="container-fluid mt--7">
    @can('make booking')
    <div class="row">
        <div class="col-xl-12 order-xl-1">
            <div class="card bg-secondary shadow">
                <div class="card-body">
                    <form method="POST" action="{{route('schedule.find')}}" id="form">
                        @csrf
                        <div class="form-group{{ $errors->has('day') ? ' has-danger' : '' }}">
                            <h3 class="text-center"> اليوم </h3>
                            <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                </div>
                                <input class="form-control datepicker" placeholder="Select date" type="text"  name="day" required>
                            </div>
                            @if ($errors->has('day'))
                                <span class="alert alert-danger" role="alert">
                                    <strong>{{ $errors->first('day') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('from') ? ' has-danger' : '' }}">
                            <h3 class="text-center"> من </h3>
                            <input type="time" class="form-control" value="08:30" step="600" name="from" required>
                            @if ($errors->has('from'))
                                <span class="alert alert-danger" role="alert">
                                    <strong>{{ $errors->first('from') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('to') ? ' has-danger' : '' }}">
                            <h3 class="text-center"> الى </h3>
                            <input type="time" class="form-control" value="09:30" step="600" name="to" required>
                            @if ($errors->has('to'))
                                <span class="alert alert-danger" role="alert">
                                    <strong>{{ $errors->first('to') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('number') ? ' has-danger' : '' }}">
                            <h3 class="text-center"> عدد الحضور </h3>
                            <input type="number" class="form-control" value="5" step="5" name="number" required>
                            @if ($errors->has('number'))
                                <span class="alert alert-danger" role="alert">
                                    <strong>{{ $errors->first('number') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('meeting_name') ? ' has-danger' : '' }}">
                            <h3 class="text-center"> اسم الخدمة </h3>
                            <input type="text" class="form-control"  name="meeting_name" required>
                            @if ($errors->has('meeting_name'))
                                <span class="alert alert-danger" role="alert">
                                    <strong>{{ $errors->first('meeting_name') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('responsible_person') ? ' has-danger' : '' }}">
                            <h3 class="text-center"> الشخص المسؤول </h3>
                            <input type="text" class="form-control" name="responsible_person" required>
                            @if ($errors->has('responsible_person'))
                                <span class="alert alert-danger" role="alert">
                                    <strong>{{ $errors->first('responsible_person') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="custom-control custom-control-alternative custom-checkbox mb-3 text-center">
                            <input class="custom-control-input" id="customCheck1" type="checkbox" name="need_tv">
                            <label class="custom-control-label" for="customCheck1"><h3 class="text-center" >هل تريد شاشة ؟</h3></label>
                        </div>

                        <div class="custom-control custom-control-alternative custom-checkbox mb-3 text-center">
                            <input class="custom-control-input" id="customCheck2" type="checkbox" name="repeat">
                            <label class="custom-control-label" for="customCheck2"><h3 class="text-center" >هل تكرر الخدمة اسبوعياً ؟</h3></label>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-success mt-4">{{ __('إبحث عن القاعات المتاحة') }}</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>
    @else
    <div class="row">
        <div class="col-xl-12 order-xl-1">
            <div class="card bg-secondary shadow">
                <div class="card-body">
                    <h1 class="text-center"> welcome </h1>
                    <h2 class="text-center">انت تستطيع متابعة الجدول </h2>
                    </div>
                </div>
            </div>
    </div>
    @endcan
@include('layouts.footers.auth')
</div>
@endsection @push('js')
<script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
<script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
<script src="{{ asset('argon') }}/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

@endpush