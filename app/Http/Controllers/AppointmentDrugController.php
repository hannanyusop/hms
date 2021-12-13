<?php

namespace App\Http\Controllers;

use App\Http\Requests\Drug\DrugStoreRequest;
use App\Http\Requests\Drug\DruoUpdateRequest;
use App\Models\Appointment;
use App\Models\AppointmentHasDrug;
use App\Models\Disease;
use App\Models\Drug;
use Illuminate\Http\Request;

class AppointmentDrugController extends Controller{

    public function create($appointment_id){

        $appointment = Appointment::where([
            'checked_by'       => auth()->user()->id,
            'completed_status' => 0
        ])
            ->find(decrypt($appointment_id));

        if(!$appointment){
            return redirect()->back()->with('error', __('Invalid appointment.'));
        }

        $drugs = Drug::get();

        return view('appointment.drug.create', compact('appointment', 'drugs'));
    }

    public function store(Request $request, $appointment_id){

        $appointment = Appointment::where([
            'checked_by'       => auth()->user()->id,
            'completed_status' => 0
        ])
            ->find(decrypt($appointment_id));

        if(!$appointment){
            return redirect()->back()->with('error', __('Invalid appointment.'));
        }

        $drug = Drug::findOrFail($request->drug_id);

        $ahd = new AppointmentHasDrug();
        $ahd->appointment_id = $appointment->id;
        $ahd->drug_id        = $drug->id;
        $ahd->qty            = $request->qty;
        $ahd->price_per_item = $ahd->after_adjustment = $drug->price;
        $ahd->remark         = $request->remark;
        $ahd->save();

        return redirect()->back()->with('success', __('Drug added.'));
    }

    public function destroy($id){

        $ahd = AppointmentHasDrug::findOrFail($id);

        $ahd->delete();
//        return redirect()->back()->with('success', __('Disease removed from list.'));
        return redirect()->back();

    }
}
