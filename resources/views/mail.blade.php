<html>
        <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="ie=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <meta name="csrf-token" content="{{ csrf_token() }}">
                <title>{{ config('app.name', 'Argon Dashboard') }}</title>
                <!-- Favicon -->
                <link href="{{ asset('argon') }}/img/brand/favicon.png" rel="icon" type="image/png">
                <!-- Fonts -->
                <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
                <!-- Icons -->
                <link href="{{ asset('argon') }}/vendor/nucleo/css/nucleo.css" rel="stylesheet">
                <link href="{{ asset('argon') }}/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
                <!-- Argon CSS -->
                <link type="text/css" href="{{ asset('argon') }}/css/argon.css?v=1.0.0" rel="stylesheet">
            </head>
            <body class="{{ $class ?? '' }}">
                    <div class="main-content">
            <div class="container-fluid mt--7">
                    <div class="row">
                        <div class="col-xl-12 order-xl-1">
                            <div class="card bg-secondary shadow">
                                <div class="card-body">
                                    <img class="card-img-top" src="{{ asset('argon') }}/img/brand/blue.png" alt="Card image cap">
                                    <div class="text-center text-muted mb-4">
                                        <h1><strong>يوجد</strong> {{ __('حجز جديد') }}</h1>
                                        <a href="http://www.stgeorgeitd.tk/schedule/show" class="btn btn-success mt-4"><h2>{{ __('اذهب الى الموقع ') }}</h2></a>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>