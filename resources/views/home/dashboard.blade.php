@extends('layouts.user')

@section('title', __('Dashboard'))

@section('content')
    <div class="container">
        <div class="doctor-widget doctor-dashboard">
            <div class="doc-info-left">
                <div class="doc-info-cont">
                    <h4 class="doc-name"><a href="#">Hi, {{ auth()->user()->name }}</a></h4>
                    <div class="doc-info">
                        <div class="rating">
                            <span class="doc-experince">Role : {{ auth()->user()->role }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('home.role.'.auth()->user()->role)
        <div class="patients-list">
            <div class="container">
                @foreach($myActive as $active)
                    <div class="patient-widget">
                        <div class="patient-top-details">
                            <div>
                                <span>Patient ID - {{ $active->patient->card_no_format }}</span>
                            </div>
                        </div>
                        <div class="pat-info-left">
                            <div class="pat-info-cont">
                                <h4 class="pat-name"><a href="patient-profile.html">{{ $active->patient->name }}</a></h4>
                                <div class="patient-details-col">
                                    <span>{{ $active->patient->age }}, Female</span>
                                </div>
                                <div class="pat-contact">
                            <span class="icon-phone">
                            <i class="fas fa-phone"></i>
                            </span>
                                    <span>{{ $active->patient->no_phone }}</span>
                                </div>

                                <div class="status-col">

                                    @if(auth()->user()->role == \App\Services\UserService::doctor)
                                        <div class="status-btn">
                                            <a href="{{ route('appointment.check', encrypt($active->id)) }}" class="btn success"><i><img src="{{ asset('assets/images/icon-checkmark.svg') }}" alt=""></i>Check</a>
                                        </div>
                                    @elseif(auth()->user()->role == \App\Services\UserService::pharmacy)
                                        <div class="status-btn">
                                            <a href="{{ route('appointment.pharmacy', encrypt($active->patient->id)) }}" class="btn success"><i><img src="{{ asset('assets/images/icon-checkmark.svg') }}" alt=""></i>Generate Invoice</a>
                                        </div>
                                    @endif
                                        <div class="status-btn">
                                            <a href="{{ route('patient.show', encrypt($active->patient->id)) }}" class="btn view-eye"><i><img src="{{ asset('assets/images/icon-awesome-eye.svg') }}" alt=""></i>View</a>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="patient-details">
            <div class="inner-patient-detaials">
                <div class="patient-col">
                    <div class="inner-patient-col">
                        <div class="progress-col">
                            <div class="c100 p100 small">
                                <span class="pat-img"><img src="assets/images/dentist-1.svg" alt="dentist"></span>
                                <div class="slice">
                                    <div class="bar"></div>
                                    <div class="fill"></div>
                                </div>
                            </div>
                        </div>
                        <h6>Waiting Hall</h6>
                        <h4>{{ $count['waiting'] }}</h4>
                    </div>
                </div>
                <div class="patient-col">
                    <div class="inner-patient-col">
                        <div class="progress-col">
                            <div class="c100 p100 small">
                                <span class="pat-img"><img src="assets/images/dentist-1.svg" alt="dentist"></span>
                                <div class="slice">
                                    <div class="bar"></div>
                                    <div class="fill"></div>
                                </div>
                            </div>
                        </div>
                        <h6>Doctor Room</h6>
                        <h4>{{ $count['doctor'] }}</h4>
                    </div>
                </div>
                <div class="patient-col">
                    <div class="inner-patient-col">
                        <div class="progress-col">
                            <div class="c100 p100 small">
                                <span class="pat-img"><img src="assets/images/dentist-1.svg" alt="dentist"></span>
                                <div class="slice">
                                    <div class="bar"></div>
                                    <div class="fill"></div>
                                </div>
                            </div>
                        </div>
                        <h6>Pharmacy Lane</h6>
                        <h4>{{ $count['pharmacy'] }}</h4>
                    </div>
                </div>
                <div class="patient-col">
                    <div class="inner-patient-col">
                        <div class="progress-col">
                            <div class="c100 p40 small">
                                <span class="pat-img"><img src="assets/images/patient.svg" alt="patient"></span>
                                <div class="slice">
                                    <div class="bar"></div>
                                    <div class="fill"></div>
                                </div>
                            </div>
                        </div>
                        <h6>Today Patient</h6>
                        <h4>{{ $count['completed'] }}</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
