<?php

namespace App\Http\Controllers;

use App\Http\Requests\Appointment\AppointmentStoreRequest;
use App\Models\Appointment;
use App\Models\Patient;
use App\Services\AppointmentService;
use App\Services\QmsService;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function index(){

        $appointments = Appointment::where('created_at', Carbon::today())->get();
        return view('appointment.index', compact('appointments'));
    }
    public function today(){

        $appointments = Appointment::where('created_at', Carbon::today())->get();
        return view('appointment.today', compact('appointments'));
    }

    public function create(){

        $patients = Patient::pluck('name', 'id');

        return view('appointment.create', compact('patients'));
    }

    public function store(AppointmentStoreRequest $request){

        $check = Appointment::where([
            'patient_id' => $request->patient_id,
            'checked_by' => null
        ])
            ->whereDate('created_at', Carbon::today())
            ->first();

        if($check){
            return redirect()->back()->with('error', __('Already registered. Queue Number is :qms', ['qms' => $check->qms_format]));
        }

        $appointment = new Appointment();
        $appointment->code       = AppointmentService::getCode();
        $appointment->patient_id = $request->patient_id;
        $appointment->qms_no     = AppointmentService::getQMS();
        $appointment->save();
        return redirect()->back()->with('success', __('Queue Number is :qms', ['qms' => $appointment->qms_format]));
    }

    public function check($id){

        $appointment = Appointment::where([
            'checked_by'       => auth()->user()->id,
            'completed_status' => 0
        ])
            ->find(decrypt($id));

        if(!$appointment){
            return redirect()->back()->with('error', __('Invalid appointment.'));
        }

        return view('appointment.check', compact('appointment'));
    }

    public function checkCompleted($id){

        $appointment = Appointment::where([
            'checked_by'       => auth()->user()->id,
            'completed_status' => 0
        ])->find(decrypt($id));


        if(!$appointment){
            return redirect()->back()->with('error', __('Invalid appointment.'));
        }

        $appointment->completed_status = 1;
        $appointment->save();

        return  redirect()->route('frontend.user.dashboard')->with('success', __('Appointment successful'));
    }

    public function pharmacy($id){

        $appointment = Appointment::where([
            'checked_by'       => auth()->user()->id,
            'completed_status' => 1
        ])->find(decrypt($id));

        if(!$appointment){
            return redirect()->back()->with('error', __('Invalid appointment.'));
        }

        return view('appointment.check', compact('appointment'));
    }

    public function pharmacyCompleted($id){

        $appointment = Appointment::where([
            'checked_by'       => auth()->user()->id,
            'completed_status' => 1
        ])->find(decrypt($id));

        if(!$appointment){
            return redirect()->back()->with('error', __('Invalid appointment.'));
        }

        $appointment->completed_status = 2;
        $appointment->save();

        return  redirect()->back()->with('success', __('Appointment successful'));
    }

}
