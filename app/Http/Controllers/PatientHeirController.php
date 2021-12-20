<?php

namespace App\Http\Controllers;

use App\Http\Requests\Disease\DiseaseStoreRequest;
use App\Http\Requests\Disease\DiseaseUpdateRequest;
use App\Http\Requests\Heir\HeirStoreRequest;
use App\Models\Disease;
use App\Models\PatientHasHeir;
use Illuminate\Http\Request;

class PatientHeirController extends Controller
{

    public function store(HeirStoreRequest $request){


        $heir = new PatientHasHeir();
        $heir->patient_id = $request->patient_id;
        $heir->name       = strtoupper($request->name);
        $heir->relation   = strtoupper($request->relation);
        $heir->no_phone   = strtoupper($request->no_phone);
        $heir->dob        = strtoupper($request->dob);
        $heir->save();

        return redirect()->back()->with('success', __('Heir inserted.'));

    }

    public function delete($id){

        session(['active' => 'heir']);
        $heir = PatientHasHeir::findOrFail(decrypt($id));
        $heir->delete();
        return redirect()->back()->with('success', __('Heir deleted.'));
    }

}
