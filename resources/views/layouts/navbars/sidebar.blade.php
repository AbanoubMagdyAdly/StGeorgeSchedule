<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Brand -->
        <a class="navbar-brand pt-0" href="{{ route('home') }}">
            <img src="{{ asset('argon') }}/img/brand/blue.png" class="navbar-brand-img" alt="...">
        </a>
        <!-- User -->
        <ul class="nav align-items-center d-md-none">
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="media align-items-center">
                        <span class="avatar avatar-sm rounded-circle">
                        <img alt="Image placeholder" src="{{ asset('argon') }}/img/theme/team-1-800x800.jpg">
                        </span>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                    <div class=" dropdown-header noti-title">
                        <h6 class="text-overflow m-0">{{ __('مرحباً') }}</h6>
                    </div>
                    <a href="{{ route('profile.edit') }}" class="dropdown-item">
                        <i class="ni ni-single-02"></i>
                        <span>{{ __('الملف الشخصي') }}</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        <i class="ni ni-user-run"></i>
                        <span>{{ __('تسجيل خروج') }}</span>
                    </a>
                </div>
            </li>
        </ul>
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
            <!-- Collapse header -->
            <div class="navbar-collapse-header d-md-none">
                <div class="row">
                    <div class="col-6 collapse-brand">
                        <a href="{{ route('home') }}">
                            <img src="{{ asset('argon') }}/img/brand/blue.png">
                        </a>
                    </div>
                    <div class="col-6 collapse-close">
                        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Form -->
            <form class="mt-4 mb-3 d-md-none">
                <div class="input-group input-group-rounded input-group-merge">
                    <input type="search" class="form-control form-control-rounded form-control-prepended" placeholder="{{ __('Search') }}" aria-label="Search">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <span class="fa fa-search"></span>
                        </div>
                    </div>
                </div>
            </form>
            <!-- Navigation -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">
                        <i class="ni ni-controller text-primary"></i> {{ __('الحجز') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="#navbar-examples" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-examples">
                        <i class="fab fa-laravel" style="color: #f4645f;"></i>
                        <span class="nav-link-text" style="color: #f4645f;">{{ __('اعدادات الحساب') }}</span>
                    </a>

                    <div class="collapse" id="navbar-examples">
                        <ul class="nav nav-sm flex-column">
                            <li class=" nav-item">
                                <a class=" nav-link" href="{{ route('profile.edit') }}">
                                    {{ __('الملف الشخصي') }}
                                </a>
                            </li>
                            @can('edit users')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('user.index') }}">
                                    {{ __('ادارة المستخدمين') }}
                                </a>
                            </li>
                            @endcan
                            
                        </ul>
                    </div>
                </li>

                @can('view schedule')
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('schedule.index') }}">
                        <i class="ni ni-calendar-grid-58 text-green"></i> {{ __('جدول الحجز ') }}
                    </a>
                </li>
                @endcan
                
                @can('edit rooms')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('room.index') }}">
                            <i class="ni ni-shop text-orange"></i> {{ __('القاعات') }}
                        </a>
                    </li>
                @endcan

                @can('accept booking')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('schedule.showall') }}">
                            <i class="ni ni-check-bold text-black"></i> {{ __('قبول طلبات الحجز') }}
                        </a>
                    </li>
                @endcan

                @can('secretary booking')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('schedule.secretarybookingForm') }}">
                            <i class="ni ni-bell-55 text-red"></i> {{ __('حجز مكتب الخدمة') }}
                        </a>
                    </li>
                @endcan

                @can('make booking')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('schedule.getUserBookings') }}">
                            <i class="ni ni-glasses-2 text-red"></i> {{ __('حجزات خدمتى') }}
                        </a>
                    </li>
                @endcan

                @can('edit users')
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('schedule.unbookReason') }}">
                        <i class="ni ni-glasses-2" style="color:#ffa500"></i> {{ __('اسباب الغاء الحجزات') }}
                    </a>
                </li>
                @endcan
            </ul>
        </div>
    </div>
</nav>