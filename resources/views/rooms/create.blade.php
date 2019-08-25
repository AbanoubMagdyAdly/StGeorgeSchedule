@extends('layouts.app', ['title' => __('room Management')])

@section('content')
    @include('users.partials.header', ['title' => __('Add room')])   

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('room Management') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('room.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('room.store') }}" autocomplete="off">
                            @csrf
                            
                            <h6 class="heading-small text-muted mb-4">{{ __('room information') }}</h6>
                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Name') }}</label>
                                    <input type="text" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name') }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('building') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-building">{{ __('building') }}</label>
                                    <select class="form-control" name="building">
                                            <option>EL-Amir</option>
                                            <option>EL-Batal</option>
                                            <option>EL-Knesa</option>
                                            <option>EL-Romany</option>
                                        </select>
                                    @if ($errors->has('building'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('building') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('capacity') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-capacity">{{ __('capacity') }}</label>
                                    <input type="number" name="capacity" id="input-capacity" class="form-control form-control-alternative{{ $errors->has('capacity') ? ' is-invalid' : '' }}" placeholder="{{ __('capacity') }}" value="5" step="5"required>
                                    
                                    @if ($errors->has('capacity'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('capacity') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="custom-control custom-radio mb-3">
                                        <input name="has_tv" class="custom-control-input" id="customRadio5" type="checkbox" value="1">
                                        <label class="custom-control-label" for="customRadio5">Has Tv</label>
                                      </div>
                                      <div class="custom-control custom-radio mb-3">
                                        <input name="has_air_conditioner" class="custom-control-input" id="customRadio6"  type="checkbox" value="1">
                                        <label class="custom-control-label" for="customRadio6">Has Air conditioner</label>
                                      </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        @include('layouts.footers.auth')
    </div>
@endsection