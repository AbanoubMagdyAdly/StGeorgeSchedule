@extends('layouts.app') @section('content') @include('users.partials.header', [ 'title' => __('Hello') . ' '. auth()->user()->name, 'description' => __('This is your profile page. You can see the progress you\'ve made with your work and manage your projects
or assigned tasks'), 'class' => 'col-lg-7' ])
<div class="container-fluid mt--7">
    <div class="row">
        <div class="col-xl-12 order-xl-1">
            <div class="card bg-secondary shadow">
                <div class="card-body">
                    <form method="POST" action="{{route('schedule.find')}}" id="form">
                        @csrf
                        <div class="form-group">
                            Day:
                            <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                </div>
                                <input class="form-control datepicker" placeholder="Select date" type="text" value="2019-06-12" name="day">
                            </div>
                        </div>
                        <div class="form-group">
                            From:
                            <input type="time" class="form-control" value="08:30" step="600" name="from">
                        </div>

                        <div class="form-group">
                            To:
                            <input type="time" class="form-control" value="09:30" step="600" name="to">
                        </div>

                        <div class="form-group">
                            Number of servant:
                            <input type="number" class="form-control" value="5" step="5" name="number">
                        </div>
                        <div class="custom-control custom-control-alternative custom-checkbox mb-3">
                            <input class="custom-control-input" id="customCheck5" type="checkbox" name="need_tv">
                            <label class="custom-control-label" for="customCheck5">Need Presenter (TV)</label>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-success mt-4">{{ __('Search For available rooms') }}</button>
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