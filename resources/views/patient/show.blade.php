@extends('layouts.user')

@section('title', __('View Patient'))

@section('content')

    <div class="back-btn">
        <a href="{{ route('patient.index') }}" class="back link">
            <img src="{{ asset('assets/images/left-arrow-big-black.svg') }}" alt="">
        </a>
    </div>

    <div class="page-content profile-settings">
        <div class="container">
            <div class="tab-col">
                <ul class="nav nav-tabs">
                    <li><a href="#basic" data-toggle="tab" class="{{ ($active == "basic")? "active" : "" }}">Basic Info</a></li>
                    <li><a href="#health" data-toggle="tab" class="{{ ($active == "health")? "active" : "" }}">Health Background</a></li>
                    <li><a href="#heir" data-toggle="tab" class="{{ ($active == "heir")? "active" : "" }}">Heirs Details</a></li>
                    <li><a href="#medical" data-toggle="tab" class="{{ ($active == "medical")? "active" : "" }}">Medical Record</a></li>
                </ul>
            </div>
            <div class="tab-content">
                <div class="tab-pane {{ ($active == "basic")? "active" : "" }}" id="basic">
                    <div class="panel panel-default">
                        <div id="collapseOne" class="panel-collapse collapse in">
                            <div class="panel-body">
                                <div class="setting-widget">
                                    <div class="list no-hairlines-md">
                                        <div class="widget-title">
                                            <h5>Basic Information</h5>
                                        </div>
                                        <form>
                                            <ul>
                                                <li class="item-content item-input">
                                                    <div class="item-col">
                                                        <div class="item-title item-label">Full Name (As Per MyKad/Passport) <span>*</span></div>
                                                        <div class="item-input-wrap">
                                                            {{ Form::text('name', $patient->name, ['class' => 'form-control text-uppercase']) }}
                                                            @error('name')<small class="text-danger text-small font-weight-bold">{{ $message }}</small>@enderror
                                                            <span class="input-clear-button"></span>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="item-content item-input">
                                                    <div class="item-col">
                                                        <div class="item-title item-label">MyKad <span>*</span></div>
                                                        <div class="item-input-wrap">
                                                            {{ Form::text('no_ic', $patient->no_ic, ['class' => 'form-control', 'placeholder' => 'XXXXXX-XX-XXXX']) }}
                                                            @error('no_ic')
                                                            <small class="text-danger text-small font-weight-bold">{{ $message }}</small>
                                                            @enderror                                                            <span class="input-clear-button"></span>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="item-content item-input">
                                                    <div class="item-col">
                                                        <div class="item-title item-label">Passport Number <span>*</span></div>
                                                        <div class="item-input-wrap">
                                                            {{ Form::text('no_passport', $patient->no_passport, ['class' => 'form-control']) }}
                                                            @error('no_passport')
                                                            <small class="text-danger text-small font-weight-bold">{{ $message }}</small>
                                                            @enderror
                                                            <span class="input-clear-button"></span>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="item-content item-input">
                                                    <div class="item-col">
                                                        <div class="item-title item-label">Date Of Birth <span>*</span></div>
                                                        <div class="item-input-wrap">
                                                            {{ Form::date('dob', $patient->dob, ['class' => 'form-control']) }}
                                                            @error('dob')
                                                            <small class="text-danger text-small font-weight-bold">{{ $message }}</small>
                                                            @enderror                                                            <span class="input-clear-button"></span>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="item-content item-input">
                                                    <div class="item-col">
                                                        <div class="item-title item-label">Phone Number</div>
                                                        <div class="item-input-wrap">
                                                            {{ Form::text('no_phone', $patient->no_phone, ['class' => 'form-control']) }}
                                                            @error('no_phone')
                                                            <small class="text-danger text-small font-weight-bold">{{ $message }}</small>
                                                            @enderror                                                            <span class="input-clear-button"></span>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="item-content item-input col-50 gender">
                                                    <div class="item-col">
                                                        <div class="item-title item-label">Nationality</div>
                                                        <div class="item-input-wrap">
                                                            {{ Form::select('nationality', \App\Services\PatientService::nationality(),$patient->nationality, ['class' => 'form-control']) }}
                                                            @error('nationality')
                                                            <small class="text-danger text-small font-weight-bold">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="bottom-button">
                                                    <button type="submit" class="btn">Save Basic Info</button>
                                                </li>
                                            </ul>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane {{ ($active == "health")? "active" : "" }}" id="health">
                    <div class="panel panel-default">
                        <div id="collapseTwo" class="panel-collapse collapse">
                            <div class="panel-body">
                                <div class="setting-widget">
                                    <div class="widget-title">
                                        <h5>Health Background</h5>
                                    </div>
                                    {{ Form::open(['url' => route('patient.updateHealth', encrypt($patient->id))]) }}
                                    <form>
                                        <ul>
                                            <li class="item-content item-input">
                                                <div class="item-col">
                                                    <div class="item-title item-label">Allergies Information</div>
                                                    <div class="item-input-wrap">
                                                        {{ Form::textarea('allergies_information', $patient->allergies_information, ['class' => 'form-control']) }}
                                                        @error('allergies_information')<small class="text-danger text-small font-weight-bold">{{ $message }}</small>@enderror
                                                        <span class="input-clear-button"></span>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="item-content item-input">
                                                <div class="item-col">
                                                    <div class="item-title item-label">Diseases Information</div>
                                                    <div class="item-input-wrap">
                                                        {{ Form::textarea('diseases_history', $patient->diseases_history, ['class' => 'form-control']) }}
                                                        @error('diseases_history')<small class="text-danger text-small font-weight-bold">{{ $message }}</small>@enderror
                                                        <span class="input-clear-button"></span>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="bottom-button">
                                                <button type="submit" class="btn">Save Health Background</button>
                                            </li>
                                        </ul>
                                    {{ Form::close() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane {{ ($active == "heir")? "active" : "" }}" id="heir">
                    <div class="panel panel-default">
                        <div id="collapseSix" class="panel-collapse collapse">
                            <div class="panel-body">
                                <div class="setting-widget">
                                    <div class="widget-title">
                                        <h5>Add Heirs</h5>
                                    </div>
                                    <div class="heir">

                                        {{ Form::open(['url' => route('heir.store'), 'class' => 'append-col']) }}
                                        {{ Form::hidden('patient_id', $patient->id) }}
                                            <ul class="education-details">
                                                <li class="item-content item-input trash-icon-for-tab">
                                                    <span class="trash-icon"></span>
                                                </li>
                                                <li class="item-content item-input col-50 gender">
                                                    <div class="item-col">
                                                        <div class="item-title item-label">Name</div>
                                                        <div class="item-input-wrap">
                                                            {{ Form::text('name', old('name'), ['class' => 'form-control']) }}
                                                            @error('name')<small class="text-danger text-small font-weight-bold">{{ $message }}</small>@enderror
                                                            <span class="input-clear-button"></span>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="item-content item-input col-50 gender">
                                                    <div class="item-col">
                                                        <div class="item-title item-label">Name</div>
                                                        <div class="item-input-wrap">
                                                            {{ Form::text('name', old('name'), ['class' => 'form-control']) }}
                                                            @error('name')<small class="text-danger text-small font-weight-bold">{{ $message }}</small>@enderror
                                                            <span class="input-clear-button"></span>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="item-content item-input col-50 gender">
                                                    <div class="item-col">
                                                        <div class="item-title item-label">Relation</div>
                                                        <div class="item-input-wrap">
                                                            {{ Form::text('relation', old('relation'), ['class' => 'form-control']) }}
                                                            @error('relation')<small class="text-danger text-small font-weight-bold">{{ $message }}</small>@enderror
                                                            <span class="input-clear-button"></span>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="item-content item-input col-50 gender">
                                                    <div class="item-col">
                                                        <div class="item-title item-label">Phone</div>
                                                        <div class="item-input-wrap">
                                                            {{ Form::text('no_phone', old('no_phone'), ['class' => 'form-control']) }}
                                                            @error('no_phone')<small class="text-danger text-small font-weight-bold">{{ $message }}</small>@enderror
                                                            <span class="input-clear-button"></span>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="item-content item-input col-50 gender">
                                                    <div class="item-col">
                                                        <div class="item-title item-label">Date Of Birth</div>
                                                        <div class="item-input-wrap">
                                                            {{ Form::date('dob', old('dob'), ['class' => 'form-control']) }}
                                                            @error('dob')<small class="text-danger text-small font-weight-bold">{{ $message }}</small>@enderror
                                                            <span class="input-clear-button"></span>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                            <ul>
                                                <li class="bottom-button">
                                                    <button type="submit" class="btn">Add</button>
                                                </li>
                                            </ul>
                                        {{ Form::close() }}
                                    </div>
                                    <div class="work-experience">
                                        <div class="widget-title">
                                            <h5>Heirs</h5>
                                        </div>

                                        <div class="table-responsive">
                                            <table class="table table-striped">
                                                <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Relation</th>
                                                    <th>Phone</th>
                                                    <th>DOB</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @forelse($patient->heirs as $key => $heir)
                                                    <tr>
                                                        <td>{{ $heir->name }}</td>
                                                        <td>{{ $heir->relation }}</td>
                                                        <td>{{ $heir->phone }}</td>
                                                        <td>{{ $heir->dob }}</td>
                                                        <td>
                                                            <a href="#" class="btn btn-info  btn-sm">Edit</a>
                                                            <a href="{{ route('heir.delete', encrypt($heir->id)) }}" onclick="return confirm('Are you sure want to delete this data?')" class="btn btn-warning btn-sm">Delete</a>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <th colspan="5" class="text-center">No Appointment Mada</th>
                                                    </tr>
                                                @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane {{ ($active == "medical")? "active" : "" }}" id="medical">
                    <div class="panel panel-default">
                        <div id="collapseFour" class="panel-collapse collapse">
                            <div class="panel-body">
                                <div class="setting-widget">
                                    <div class="widget-title">
                                        <h5>Medical Record</h5>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Code</th>
                                                <th>Cost</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @forelse($patient->appointments as $key => $appointment)
                                                <tr>
                                                    <td>{{ $appointment->created_at }}</td>
                                                    <td>{{ $appointment->code }}</td>
                                                    <td>RM{{ $appointment->bill->total ?? "0.00" }}</td>
                                                    <td>
                                                        <a href="#" class="btn btn-info  btn-sm">View</a>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <th colspan="4" class="text-center">No Appointment Mada</th>
                                                </tr>
                                            @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                    <ul>
                                        <li class="bottom-button">
                                            <button class="btn">Next</button>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
@push('after-scripts')
@endpush
