<?php

namespace App\Http\Controllers;

use App\Http\Requests\Drug\DrugStoreRequest;
use App\Http\Requests\Drug\DruoUpdateRequest;
use App\Models\Appointment;
use App\Models\AppointmentHasDisease;
use App\Models\AppointmentHasDrug;
use App\Models\Disease;
use App\Models\Drug;
use App\Services\AppointmentService;
use Illuminate\Http\Request;

class AppointmentDiseaseController extends Controller{

    public function create($appointment_id){

        $appointment = Appointment::where([
            'checked_by'       => auth()->user()->id,
            'completed_status' => AppointmentService::checking
        ])
            ->find(decrypt($appointment_id));

        if(!$appointment){
            return redirect()->back()->with('error', __('Invalid appointment.'));
        }

        $diseases = Disease::get();

        return view('appointment.disease.create', compact('appointment', 'diseases'));
    }

    public function store(Request $request, $appointment_id){

        $appointment = Appointment::where([
            'checked_by'       => auth()->user()->id,
            'completed_status' => AppointmentService::checking
        ])
            ->find(decrypt($appointment_id));

        if(!$appointment){
            return redirect()->back()->with('error', __('Invalid appointment.'));
        }

        $disease = Disease::findOrFail($request->disease_id);
        $ahd     = new AppointmentHasDisease();

        $ahd->appointment_id = $appointment->id;
        $ahd->disease_id     = $disease->id;
        $ahd->remark         = $request->remark;
        $ahd->save();

        return redirect()->back()->with('success', __('Disease added.'));
    }

    public function destroy($id){

        $ahd = AppointmentHasDisease::findOrFail($id);

        $ahd->delete();
//        return redirect()->back()->with('success', __('Disease removed from list.'));
        return redirect()->back();

    }
}
