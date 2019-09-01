@extends('layouts.app') @section('content') @include('users.partials.header', [ 'title' => __('مرحباً') . ' '. auth()->user()->name])

<link href='{{ asset('packages') }}/core/main.css' rel='stylesheet' />
<link href='{{ asset('packages') }}/daygrid/main.css' rel='stylesheet' />
<link href='{{ asset('packages') }}/list/main.css' rel='stylesheet' />
<script src='{{ asset('packages') }}/core/main.js'></script>
<script src='{{ asset('packages') }}/interaction/main.js'></script>
<script src='{{ asset('packages') }}/daygrid/main.js'></script>
<script src='{{ asset('packages') }}/list/main.js'></script>
<script src='{{ asset('packages') }}/google-calendar/main.js'></script>
<link href='{{ asset('packages') }}/timegrid/main.css' rel='stylesheet' />
<script src='{{ asset('packages') }}/timegrid/main.js'></script>
<script>

    document.addEventListener('DOMContentLoaded', function() {
      var calendarEl = document.getElementById('calendar');
      var today = new Date()
      var dd = String(today.getDate()).padStart(2, '0');
      var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
      var yyyy = today.getFullYear();
      today = yyyy + '-' + mm + '-' + dd;
      var approved = ["فى انتظار الموافقة", "تمت الموافقة"];
      var calendar = new FullCalendar.Calendar(calendarEl, {
        plugins: [ 'dayGrid', 'timeGrid' , 'list'],
        header: {
          left: 'prev,next today',
          center: 'title',
          right: 'dayGridMonth,listWeek'
        },
        defaultDate: today,
        navLinks: true, // can click day/week names to navigate views
        selectable: true,
        selectMirror: true,
        select: function(arg) {
          var title = prompt('Event Title:');
          if (title) {
            calendar.addEvent({
              title: title,
              start: arg.start,
              end: arg.end,
              allDay: arg.allDay
            })
          }
          calendar.unselect()
        },
        editable: true,
        eventLimit: true, // allow "more" link when too many events
        events: [
          @foreach ($bookings as $booking)
          {
            title: 'قاعة : {{$booking->room_id}} '+ ' اجتماع : {{$booking->meeting_name}} ' + ' المسؤول :  {{$booking->responsible_person}}',
            start: '{{$booking->day}}T{{$booking->from}}',
            end:   '{{$booking->day}}T{{$booking->to}}'
            @if($booking->is_approved)
                ,color: '#3cfa6f'
            @else
                ,color: '#fcdb00'
            @endif
          },
          @endforeach
        ]
      });
  
      calendar.render();
    });
  
  </script>
<style>

  /* body {
    margin: 40px 10px;
    padding: 0;
    font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
    font-size: 14px;
  } */

  #loading {
    display: none;
    position: absolute;
    top: 10px;
    right: 10px;
  }

  /* #calendar {
    max-width: 900px;
    margin: 0 auto;
  } */

</style>
<div class="container-fluid mt--7">
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
    <div class="row">
        <div class="col-xl-12 order-xl-1">
            <div class="card bg-secondary shadow">
                    <div id='loading'>loading...</div>

                    <div id='calendar'></div>
        </div>
    </div>
</div>
@include('layouts.footers.auth')
</div>
@endsection @push('js')
<script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
<script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
<script src="{{ asset('argon') }}/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="{{ asset('argon') }}/vendor/jquery/dist/jquery.min.js"></script>

@endpush