@extends('layouts.user')

@section('module', __('Appointment'))
@section('title', __('List'))

@section('content')
    <div class="specialist-slider segments">
        <div class="container">
            <div class="section-title">
                <h3>Specialities
                    <a href="search-doctor.html" class="see-all-link">View All</a>
                </h3>
            </div>
            <div class="swiper-container swiper-container-initialized swiper-container-horizontal">
                <div class="swiper-wrapper" style="transform: translate3d(-313px, 0px, 0px); transition-duration: 0ms;">
                    <div class="swiper-slide" style="margin-right: 15px;">
                        <div class="content">
                            <img src="assets/images/kidneys.svg" alt="">
                            <div class="text">
                                <a href="#">Today</a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide" style="margin-right: 15px;">
                        <div class="content">
                            <img src="assets/images/brain.svg" alt="">
                            <div class="text">
                                <a href="#">All</a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide" style="margin-right: 15px;">
                        <div class="content">
                            <img src="assets/images/brain.svg" alt="">
                            <div class="text">
                                <a href="{{ route('appointment.create') }}">New</a>
                            </div>
                        </div>
                    </div>
                <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>
        </div>
    </div>
@endsection
@push('after-scripts')

@endpush
