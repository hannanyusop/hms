<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Requests\Patient\PatientStoreRequest;
use App\Http\Requests\Patient\PatientUpdateRequest;
use App\Http\Requests\Patient\UpdateHealthRequest;
use App\Models\Patient;
use App\Services\PatientService;

class PatientController
{
    public function index(){

        $patients = Patient::get();
        return view('patient.index', compact('patients'));
    }

    public function show($id){

        $patient = Patient::findOrFail(decrypt($id));

        $active = session('active', 'basic');

        return view('patient.show', compact('patient', 'active'));
    }

    public function create(){

        return view('patient.create');
    }
    public function store(PatientStoreRequest $request){

        $patient              = new Patient();
        $patient->card_no     = PatientService::generateCardNo();
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

    public function updateHealth(UpdateHealthRequest $request, $id){

        session(['active' => 'health']);

        $patient = Patient::findOrFail(decrypt($id));

        $patient->allergies_information = $request->allergies_information;
        $patient->diseases_history      = $request->diseases_history;
        $patient->save();

        return redirect()->back()->with('success', __('Patient health background updated.'));
    }

    public function edit($id){

        $patient = Patient::findOrFail(decrypt($id));

        return view('patient.edit', compact('patient'));
    }

    public function update(PatientUpdateRequest $request, $id){

        $patient              = Patient::findOrFail(decrypt($id));
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

        session(['active' => 'basic']);

        return redirect()->back()->with('success', __('New patient registered.'));
    }
}
