@extends('layouts.user')

@section('title', __('Register New Patients'))

@section('content')
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="box">

                {{ Form::open(['url' => route('patient.store'), 'class' => 'form']) }}
                    <div class="box-body">
                        <h4 class="box-title text-info mb-0"><i class="ti-user me-15"></i> About User</h4>
                        <hr class="my-15">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    {{ Form::label('name', __('Full Name (As Per MyKad/Passport)'), ['class' => 'form-label']) }}
                                    {{ Form::text('name', null, ['class' => 'form-control text-uppercase']) }}
                                    @error('name')
                                        <small class="text-danger text-small font-weight-bold">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{ Form::label('no_ic', __('MyKad'), ['class' => 'form-label']) }}
                                    {{ Form::text('no_ic', null, ['class' => 'form-control', 'placeholder' => 'XXXXXX-XX-XXXX']) }}
                                    @error('no_ic')
                                    <small class="text-danger text-small font-weight-bold">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{ Form::label('no_passport', __('Passport Number'), ['class' => 'form-label']) }}
                                    {{ Form::text('no_passport', null, ['class' => 'form-control']) }}
                                    @error('no_passport')
                                    <small class="text-danger text-small font-weight-bold">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{ Form::label('dob', __('Date Of Birth'), ['class' => 'form-label']) }}
                                    {{ Form::date('dob', null, ['class' => 'form-control']) }}
                                    @error('dob')
                                    <small class="text-danger text-small font-weight-bold">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{ Form::label('no_phone', __('Phone Number'), ['class' => 'form-label']) }}
                                    {{ Form::text('no_phone', null, ['class' => 'form-control']) }}
                                    @error('no_phone')
                                    <small class="text-danger text-small font-weight-bold">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{ Form::label('nationality', __('Nationality'), ['class' => 'form-label']) }}
                                    {{ Form::select('nationality', \App\Services\PatientService::nationality(),null, ['class' => 'form-control']) }}
                                    @error('nationality')
                                    <small class="text-danger text-small font-weight-bold">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <h4 class="box-title text-info mb-0 mt-20"><i class="ti-envelope me-15"></i>{{ __('Health Background') }}</h4>
                        <hr class="my-15">
                        <div class="form-group">
                            {{ Form::label('allergies_information', __('Allergies'), ['class' => 'form-label']) }}
                            {{ Form::textarea('allergies_information', null, ['class' => 'form-control']) }}
                            @error('allergies_information')
                            <small class="text-danger text-small font-weight-bold">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            {{ Form::label('diseases_history', __('Diseases History'), ['class' => 'form-label']) }}
                            {{ Form::textarea('diseases_history', null, ['class' => 'form-control']) }}
                            @error('diseases_history')
                            <small class="text-danger text-small font-weight-bold">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="box-footer text-end">
                        <button type="submit" class="btn btn-primary">
                            <i class="ti-save-alt"></i> {{ __('Save') }}
                        </button>
                    </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection
@push('after-scripts')
@endpush
