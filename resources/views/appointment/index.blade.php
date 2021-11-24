@extends('layouts.user')

@section('title', __('Registered Patients'))

@section('content')
    <div class="table-responsive">
        <table id="dtable" class="table table-striped table-bordered display" style="width:100%">
            <thead>
            <tr>
                <th rowspan="2">Name</th>
                <th colspan="3">Biodata</th>
                <th colspan="2">Medical History</th>
                <th>Action</th>
            </tr>
            <tr>
                <th>Identity Number</th>
                <th>DOB</th>
                <th>Phone</th>
                <th>Registered On</th>
                <th>Last Appointment</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($patients as $patient)
                <tr>
                    <td>{{ $patient->name }}</td>
                    <td>{{ $patient->identity_number }}</td>
                    <td>{{ $patient->dob }}</td>
                    <td>{{ $patient->no_phone }}</td>
                    <td>{{ $patient->created_at }}</td>
                    <td>{{ "" }}</td>
                    <th>
                        <div class="btn-group mb-5">
                            <button type="button" class="waves-effect waves-light btn btn-primary dropdown-toggle" data-bs-toggle="dropdown">{{ __('Action') }}</button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{ route('patient.show', encrypt($patient->id)) }}">{{ __('View') }}</a>
                                <a class="dropdown-item" href="{{ route('patient.edit', encrypt($patient->id)) }}">{{ __('Edit') }}</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Separated link</a>
                            </div>
                        </div>
                    </th>
                </tr>
            @endforeach
            </tbody>
            <tfoot>
            <tr>
                <th>Identity Number</th>
                <th>DOB</th>
                <th>Phone</th>
                <th>Registered On</th>
                <th>Last Appointment</th>
                <th></th>
            </tr>
            </tfoot>
        </table>
    </div>
@endsection
@push('after-scripts')

@endpush
