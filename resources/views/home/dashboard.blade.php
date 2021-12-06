@extends('layouts.user')

@section('title', __('Dashboard'))

@section('content')
    <div class="container">
        <div class="doctor-widget doctor-dashboard">
            <div class="doc-info-left">
                <div class="doctor-img">
                    <a class="doctor-img-profile" href="doctor-dashboard.html">
                        <img src="assets/images/doctors/doctor-02.jpg" class="img-fluid img-circle" alt="User Image">
                    </a>
                </div>
                <div class="doc-info-cont">
                    <div class="toggle-icon-doctor">
                        <div class="inner-toggle-icon">
                            <i class="fas fa-ellipsis-v"></i>
                        </div>
                    </div>
                    <h4 class="doc-name"><a href="doctor-profile.html">{{ auth()->user()->name }}</a></h4>
                    <p class="doc-speciality">BDS, MDS - Oral &amp; Maxillofacial Surgery</p>
                    <h5 class="doc-department">
                        <span class="speciality-img"><img src="assets/images/specialities/specialities-05.png" class="img-fluid" alt="Speciality"></span> Dentist
                    </h5>
                    <div class="doc-info">
                        <div class="rating">
                            <span class="doc-experince">15+ Exp</span>
                        </div>
                        <div class="doc-location">
                            <p>(<i class="fas fa-map-marker-alt"></i> Florida, USA)</p>
                        </div>
                    </div>
                </div>
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
                        <h6>Pending Patients</h6>
                        <h4>{{ $doctorPending->count() }}</h4>
                        <span class="date">March 16, 2020</span>
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
                        <h6>Today Patients</h6>
                        <h4>160</h4>
                        <span class="date">March 16, 2020</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="appointments-details">
            <div class="inner-appointment">
                <div class="appointment-col">
                    <a href="{{ route('qms.doctor-call') }}" class="btn">Next <br>Patient</a>
                </div>
                <div class="appointment-col">
                    <a href="{{ route('qms.recall') }}" class="btn">Recall <br>Patient</a>
                </div>
            </div>
        </div>
    </div>

    <div class="patients-list">
        <div class="container">
            @foreach($myActive as $active)
                <div class="patient-widget">
                    <div class="patient-top-details">
                        <div>
                            <span>Patient ID - {{ $active->patient->card_no_format }}</span>
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
                            <h4 class="pat-name"><a href="patient-profile.html">{{ $active->patient->name }}</a></h4>
                            <div class="patient-details-col">
                                <span>{{ $active->patient->age }}, Female</span>
                                <span>Blood Group - B+</span>
                            </div>
                            <div class="pat-contact">
                            <span class="icon-phone">
                            <i class="fas fa-phone"></i>
                            </span>
                                <span>{{ $active->patient->no_phone }}</span>
                            </div>

                            <div class="status-col">
                                <div class="status-btn">
                                    <a href="{{ route('appointment.check', encrypt($active->id)) }}" class="btn success"><i><img src="{{ asset('assets/images/icon-checkmark.svg') }}" alt=""></i>Check</a>
                                </div>
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

@endsection
