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
<link href='{{ asset('packages') }}/timegrid/main.css' rel='stylesheet' />
<script src='{{ asset('packages') }}/timegrid/main.js'></script>
<script>

    document.addEventListener('DOMContentLoaded', function() {
      var calendarEl = document.getElementById('calendar');
  
      var calendar = new FullCalendar.Calendar(calendarEl, {
        plugins: [ 'dayGrid', 'timeGrid' ],
        header: {
          left: 'prev,next today',
          center: 'title',
          right: 'dayGridMonth,timeGridWeek,timeGridDay'
        },
        defaultDate: '2019-08-12',
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
          @foreach ($books as $book)
          {
            title: '{{$book->room_id}}',
            start: '{{$book->day}}T{{$book->from}}',
            end:   '{{$book->day}}T{{$book->to}}'
          },
          @endforeach
        ]
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