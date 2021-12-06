@extends('layouts.user')

@section('title', __('Registered Patient'))
@section('module', __('Patient Management'))

@section('content')

    <div class="patients-list">
        <div class="container">
            @foreach($patients as $patient)
                <div class="patient-widget">
                <div class="patient-top-details">
                    <div>
                        <span>Patient ID - {{ $patient->card_no_format }}</span>
                    </div>
                    <div>
                        <span><i class="fas fa-map-marker-alt"></i> Alabama, USA</span>
                    </div>
                </div>
                <div class="pat-info-left">
                    <div class="patient-img">
                        <a href="patient-profile.html">
                            <img src="assets/images/patients/patient4.jpg" class="img-fluid" alt="User Image">
                        </a>
                    </div>
                    <div class="pat-info-cont">
                        <h4 class="pat-name"><a href="patient-profile.html">{{ $patient->name }}</a></h4>
                        <div class="patient-details-col">
                            <span>{{ $patient->age }}, Female</span>
                            <span>Blood Group - B+</span>
                        </div>
                        <div class="pat-contact">
                            <span class="icon-phone">
                            <i class="fas fa-phone"></i>
                            </span>
                            <span>{{ $patient->no_phone }}</span>
                        </div>

                        <div class="status-col">
                            <div class="status-btn">
                                <a href="#" class="btn success"><i><img src="assets/images/icon-checkmark.svg" alt=""></i>Confirm</a>
                            </div>
                            <div class="status-btn">
                                <a href="{{ route('patient.show', encrypt($patient->id)) }}" class="btn view-eye"><i><img src="{{ asset('assets/images/icon-awesome-eye.svg') }}" alt=""></i>View</a>
                            </div>
                            <div class="status-btn">
                                <a href="{{ route('patient.edit', encrypt($patient->id)) }}" class="btn print"><i><img src="assets/images/icon-metro-printer.svg" alt=""></i>Print</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

@endsection
@push('after-scripts')

@endpush
