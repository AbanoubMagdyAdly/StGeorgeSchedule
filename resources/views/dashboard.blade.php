@extends('layouts.app') 
@section('content') 
@include('users.partials.header',
 [ 'title' => __('Hello') . ' '. auth()->user()->name,
  'description' => 
  __('This is your profile page. You can see the progress you\'ve 
  made with your work and manage your projects
or assigned tasks'),
'class' => 'col-lg-7' ])
<div class="container-fluid mt--7">
    <div class="row">
        <div class="col-xl-8 mb-5 mb-xl-0">
            <form>
                  
            </form>
        </div>
        <div class="col-xl-4">

        </div>
    </div>
    @include('layouts.footers.auth')
</div>
@endsection @push('js')
<script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
<script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
<script src="{{ asset('argon') }}/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

@endpush