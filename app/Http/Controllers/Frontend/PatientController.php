<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Requests\Patient\PatientStoreRequest;
use App\Http\Requests\Patient\PatientUpdateRequest;
use App\Models\Patient;

class PatientController
{
    public function index(){

        $patients = Patient::get();
        return view('patient.create', compact('patients'));
    }

    public function create(){
        return view('patient.create');
    }

    public function store(PatientStoreRequest $request){

        $patient = new Patient();
        $patient->card_no     = "";
        $patient->name        = strtoupper($request->name);
        $patient->nationality = $request->nationality;
        $patient->no_ic       = $request->no_ic;
        $patient->no_passport = $request->no_passport;
        $patient->dob         = $request->dob;
        $patient->no_phone    = $request->no_phone;
        $patient->allergies_information = $request->allergies_information;
        $patient->diseases_history      = $request->diseases_history;
        $patient->save();

        return redirect()->back()->with('success', __('New patient registered.'));
    }

    public function edit(Patient $patient){

        return view('patient.edit', compact('patient'));
    }

    public function update(PatientUpdateRequest $request,Patient $patient){

        $patient->card_no     = "";
        $patient->name        = strtoupper($request->name);
        $patient->nationality = $request->nationality;
        $patient->no_ic       = $request->no_ic;
        $patient->no_passport = $request->no_passport;
        $patient->dob         = $request->dob;
        $patient->no_phone    = $request->no_phone;
        $patient->allergies_information = $request->allergies_information;
        $patient->diseases_history      = $request->diseases_history;
        $patient->save();

        return redirect()->back()->with('success', __('New patient registered.'));
    }
}
