@extends('layouts.user')

@section('title', __('Register New Appointment'))

@section('content')
    {{ Form::open(['url' => route('appointment.create'), 'class' => 'form mt-2', 'method' => 'get']) }}
    <div class="top-search">
        <div class="container">
            <div class="search-area">
                <form action="https://doccureframework7.dreamguystech.com/pwa/template/search">
                    <div class="list inset">
                        <ul>
                            <li class="d-flex">
                                <div class="item-icon">
                                    <i class="search-icon fas fa-map-marker-alt"></i>
                                </div>
                                <div class="item-col">
                                    {{ Form::text('search', request('search'), ['placeholder' => __('Search by Card Number or Name')]) }}
                                </div>
                            </li>
                        </ul>
                        <button type="submit" class="button button-large button-primary btn">Search Now</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{ Form::close() }}


    @if(!isset($q))
        <div class="top-search mt-5">
            <div class="container">
                <div class="search-area">

                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>No.</th>
                                <th>Name</th>
                                <th>Card No</th>
                                <th>IC/Passport Number</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($patients as $key => $patient)
                                <tr>
                                    <th>{{ $key+1 }}</th>
                                    <th>{{ $patient->name }}</th>
                                    <th>{{ $patient->card_no_format }}</th>
                                    <th>{{ $patient->identity_number }}</th>
                                    <th>
                                        {{ Form::open(['route' => 'appointment.store', 'method' => 'post']) }}
                                            {{ Form::hidden('patient_id', $patient->id) }}
                                            <button type="submit" class="btn btn-info">Select</button>
                                        {{ Form::close() }}
                                    </th>
                                </tr>
                            @empty
                                <tr>
                                    <th colspan="5" class="text-center">No Data</th>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
@push('after-scripts')
@endpush
