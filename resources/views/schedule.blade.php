@extends('layouts.app') @section('content') @include('users.partials.header', [ 'title' => __('Hello') . ' '. auth()->user()->name, 'description' => __('This is your profile page. You can see the progress you\'ve made with your work and manage your projects
or assigned tasks'), 'class' => 'col-lg-7' ])
<link href='{{ asset('packages') }}/core/main.css' rel='stylesheet' />
<link href='{{ asset('packages') }}/daygrid/main.css' rel='stylesheet' />
<link href='{{ asset('packages') }}/list/main.css' rel='stylesheet' />
<script src='{{ asset('packages') }}/core/main.js'></script>
<script src='{{ asset('packages') }}/interaction/main.js'></script>
<script src='{{ asset('packages') }}/daygrid/main.js'></script>
<script src='{{ asset('packages') }}/list/main.js'></script>
<script src='{{ asset('packages') }}/google-calendar/main.js'></script>
<script>

  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {

      plugins: [ 'interaction', 'dayGrid', 'list', 'googleCalendar' ],

      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,listYear'
      },

      displayEventTime: false, // don't show the time column in list view

      // THIS KEY WON'T WORK IN PRODUCTION!!!
      // To make your own Google API key, follow the directions here:
      // http://fullcalendar.io/docs/google_calendar/
      googleCalendarApiKey: 'AIzaSyDcnW6WejpTOCffshGDDb4neIrXVUA1EAE',

      // US Holidays
      events: 'ar.eg#holiday@group.v.calendar.google.com',

      eventClick: function(arg) {
        // opens events in a popup window
        window.open(arg.event.url, 'google-calendar-event', 'width=700,height=600');

        arg.jsEvent.preventDefault() // don't navigate in main tab
      },

      loading: function(bool) {
        document.getElementById('loading').style.display =
          bool ? 'block' : 'none';
      }

    });

    calendar.render();
  });

</script>
<style>

  body {
    margin: 40px 10px;
    padding: 0;
    font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
    font-size: 14px;
  }

  #loading {
    display: none;
    position: absolute;
    top: 10px;
    right: 10px;
  }

  #calendar {
    max-width: 900px;
    margin: 0 auto;
  }

</style>
<div class="container-fluid mt--7">
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