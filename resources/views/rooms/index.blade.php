@extends('layouts.app', ['title' => __('room Management')])

@section('content')
    @include('users.partials.header', ['title' => __('القاعات')])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('القاعات') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('room.create') }}" class="btn btn-sm btn-primary">{{ __('اضافة قاعة') }}</a>
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
                                    <th scope="col">{{ __('اسم القاعة') }}</th>
                                    <th scope="col">{{ __('المبنى') }}</th>
                                    <th scope="col">{{ __('السعة') }}</th>
                                    <th scope="col">{{ __('يوجد تلفزيون') }}</th>
                                    <th scope="col">{{ __('يوجد تكيف') }}</th>
                                    <th scope="col">{{ __('وضع القاعة تحت الصيانة') }}</th>
                                    <th scope="col">اعدادات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($rooms as $room)
                                    <tr>
                                        <td>{{ $room->name }}</td>
                                        <td>
                                           {{ $room->building }}
                                        </td>
                                        <td>{{ $room->capacity }}</td>
                                        <td>{{ $room->has_tv? 'يوجد' : 'لا يوجد' }}</td>
                                        <td>{{ $room->has_air_conditioner? 'يوجد' : 'لا يوجد' }}</td>
                                        <td>
                                            <form id="suspend-form" method="POST" action='{{route('maintenance')}}'>
                                                {{ csrf_field() }}
                                                <input name="id" value="{{ $room->id }}" hidden>
                                                @if(!$room->in_maintenance)
                                                <label class="custom-toggle">
                                                    <input type="checkbox" onChange="this.form.submit()" name="on" value="1">
                                                    <span class="custom-toggle-slider rounded-circle"></span>
                                                </label>
                                                @else
                                                <label class="custom-toggle">
                                                    <input type="checkbox" onChange="this.form.submit()" checked name="on" value="0">
                                                    <span class="custom-toggle-slider rounded-circle"></span>
                                                </label>
                                                @endif
                                            </form>
                                        </td>
                                        <td class="text-right">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                        <form action="{{ route('room.destroy', $room) }}" method="post">
                                                            @csrf
                                                            @method('delete')
                                                            
                                                            <a class="dropdown-item" href="{{ route('room.edit', $room) }}">{{ __('Edit') }}</a>
                                                            <button type="button" class="dropdown-item" onclick="confirm('{{ __("Are you sure you want to delete this room?") }}') ? this.parentElement.submit() : ''">
                                                                {{ __('Delete') }}
                                                            </button>
                                                        </form>    
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer py-4">
                        <nav class="d-flex justify-content-end" aria-label="...">
                            {{ $rooms->links() }}
                        </nav>
                    </div>
                </div>
            </div>
        </div>
            
        @include('layouts.footers.auth')
    </div>
@endsection