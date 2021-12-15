@extends('layouts.user')

@section('module', __('Appointment'))
@section('title', __('Check Patient'))

@section('content')
    <div class="page-content profile-settings pt-0">
        {{ Form::open(["method" => "POST"]) }}
        <div class="container">
            <div class="tabs-animated-wrap">
                <div class="tabs">
                    <div class="row">
                        <div class="col-md-4">
                            <div id="Basic-info" class="page-content tab tab-active pt-0 pb-15">
                                <div class="setting-widget">
                                    <div class="list no-hairlines-md">
                                        <div class="widget-title">
                                            <h5>Basic Information</h5>
                                        </div>
                                        <div class="file-upload">
                                            <a href="doctor-profile.html" class="file-upload-img">
                                                <img src="{{ asset('assets/images/doctors/doctor-thumb-02.jpg') }}" class="img-fluid img-circle" width="85" alt="User Image">
                                                <span class="cam-icon"><img src="{{ asset('assets/images/placeholder-small.svg') }}" alt=""></span>
                                            </a>
                                        </div>
                                        <form>
                                            <ul>
                                                <li class="item-content item-input">
                                                    <div class="item-col">
                                                        <div class="item-title item-label">Name <span>*</span></div>
                                                        <div class="item-input-wrap">
                                                            <b>{{ $appointment->patient->name }}</b>
                                                            <span class="input-clear-button"></span>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="item-content item-input">
                                                    <div class="item-col">
                                                        <div class="item-title item-label">Card No<span>*</span></div>
                                                        <div class="item-input-wrap">
                                                            <b>{{ $appointment->patient->card_no_format }}</b>
                                                            <span class="input-clear-button"></span>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="item-content item-input">
                                                    <div class="item-col">
                                                        <div class="item-title item-label">Date Of Birth</div>
                                                        <div class="item-input-wrap">
                                                            <b>{{ $appointment->patient->dob }}</b>
                                                            <span class="input-clear-button"></span>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="item-content item-input">
                                                    <div class="item-col">
                                                        <div class="item-title item-label">MyKad/Passport</div>
                                                        <div class="item-input-wrap">
                                                            <b>{{ $appointment->patient->dob }}</b>
                                                            <span class="input-clear-button"></span>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="item-content item-input">
                                                    <div class="item-col">
                                                        <div class="item-title item-label">Gender</div>
                                                        <div class="item-input-wrap">
                                                            <b>{{ $appointment->patient->gender }}</b>
                                                            <span class="input-clear-button"></span>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="item-content item-input col-50 gender">
                                                    <div class="item-col">
                                                        <div class="item-title item-label">Age</div>
                                                        <div class="item-input-wrap">
                                                            <b>{{ $appointment->patient->age }}</b>
                                                            <span class="input-clear-button"></span>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="item-content item-input">
                                                    <div class="item-col">
                                                        <div class="item-title item-label">Allergies Information</div>
                                                        <div class="item-input-wrap">
                                                            <b>{{ $appointment->patient->allergies_information }}</b>
                                                            <span class="input-clear-button"></span>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="item-content item-input col-50 gender">
                                                    <div class="item-col">
                                                        <div class="item-title item-label">Diseases History</div>
                                                        <div class="item-input-wrap">
                                                            <b>{{ $appointment->patient->diseases_history }}</b>
                                                            <span class="input-clear-button"></span>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                            <div class="col-md-8">
                            <div id="Basic-info" class="page-content tab tab-active pt-0 pb-15">
                                <div class="setting-widget">
                                    <div class="list no-hairlines-md">
                                        <div class="widget-title">
                                            <h5>Diseases</h5>
                                        </div>

                                        <h6 class="font-weight-bold text-success"> Appointment : #{{ $appointment->code }}</h6>
                                        <div class="table-responsive">
                                            <table class="table table-bordered">
                                                <thead>
                                                <tr>
                                                    <th>{{ __('Code') }}</th>
                                                    <th>{{ __('Disease') }}</th>
                                                    <th>{{ __('Remark') }}</th>
                                                </tr>
                                                </thead>
                                                <thead>
                                                @foreach($appointment->diseases as $disease)
                                                    <tr>
                                                        <td>{{ $disease->type->code }}</td>
                                                        <td>{{ $disease->type->name }}</td>
                                                        <td>{{ $disease->remark }}</td>
                                                    </tr>
                                                @endforeach
                                                </thead>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="Basic-info" class="page-content tab tab-active pt-0 pb-15">
                                <div class="setting-widget">
                                    <div class="list no-hairlines-md">
                                        <div class="widget-title">
                                            <h5>Medicines</h5>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table table-bordered">
                                                <thead>
                                                <tr>
                                                    <th>{{ __('Code') }}</th>
                                                    <th>{{ __('Name') }}</th>
                                                    <th>{{ __('Remark') }}</th>
                                                    <th>{{ __('Quantity') }}</th>
                                                    <th>{{ __('Price Per Item') }}</th>
                                                </tr>
                                                </thead>
                                                <thead>
                                                @foreach($appointment->drugs as $drug)
                                                    <tr>
                                                        <td>{{ $drug->type->code }}</td>
                                                        <td>{{ $drug->type->name }}</td>
                                                        <td>{{ $drug->remark }}</td>
                                                        <td>
                                                            {{ Form::text("qty[$drug->id]", $drug->qty, ['class' => 'form-control text-uppercase']) }}
                                                            @error("qty.*")
                                                            <small class="text-danger text-small font-weight-bold">{{ $message }}</small>
                                                            @enderror
                                                        </td>
                                                        <td>
                                                            {{ Form::text("price[$drug->id]", $drug->price_per_item, ['class' => 'form-control text-uppercase']) }}
                                                            @error("price.*")
                                                            <small class="text-danger text-small font-weight-bold">{{ $message }}</small>
                                                            @enderror
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </thead>
                                            </table>
                                        </div>

                                        <li class="bottom-button">
                                            <button type="submit" class="btn btn-info btn-block">Generate Invoice</button>
                                        </li>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{ Form::close() }}
    </div>
@endsection
@push('after-scripts')
    <script>
        function removeDisease(id){

            let uid=id;
            Swal.fire({
                title: 'Do you want to remove this disease from list?',
                // showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: 'Delete',
                denyButtonText: `Cancel`,
                confirmButtonColor: 'red'
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    Swal.fire('Data deleted', '', 'success')
                    window.location='/appointment-disease/delete/'+uid;
                }
            })
        }

        function removeDrug(id){

            let uid=id;
            Swal.fire({
                title: 'Do you want to remove this drug from list?',
                // showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: 'Delete',
                denyButtonText: `Cancel`,
                confirmButtonColor: 'red'
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    Swal.fire('Data deleted', '', 'success')
                    window.location='/appointment-drug/delete/'+uid;
                }
            })
        }
    </script>
@endpush
