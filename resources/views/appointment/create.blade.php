@extends('layouts.user')

@section('title', __('Register New Patients'))

@section('content')
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="box">

                {{ Form::open(['url' => route('appointment.store'), 'class' => 'form']) }}
                    <div class="box-body">
                        <h4 class="box-title text-info mb-0"><i class="ti-user me-15"></i> About User</h4>
                        <hr class="my-15">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    {{ Form::label('patient_id', __('Patient'), ['class' => 'form-label']) }}
                                    {{ Form::select('patient_id', $patients,null, ['class' => 'form-control']) }}
                                    @error('patient_id')<small class="text-danger text-small font-weight-bold">{{ $message }}</small>@enderror
                                </div>
                            </div>
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
