<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Requests\Appointment\AppointmentStoreRequest;
use App\Http\Requests\Home\SelfRegisterRequest;
use App\Models\Appointment;
use App\Models\Patient;
use App\Services\AppointmentService;
use Carbon\Carbon;
use Illuminate\Http\Request;

/**
 * Class HomeController.
 */
class HomeController
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('frontend.index');
    }

    public function store(SelfRegisterRequest $request){

        $patient = Patient::where('card_no', $request->card_no)->first();

        if(!$patient){
            return redirect()->back()->with('error', __('No registered patient with card no: :card', ['card' => $request->card_no]));
        }

        $check = Appointment::where([
            'patient_id' => $patient->id,
            'checked_by' => null
        ])
            ->whereDate('created_at', Carbon::today())
            ->first();

        if($check){
            return redirect()->back()->with('error', __('Already registered. Queue Number is :qms', ['qms' => $check->qms_format]));
        }

        $appointment = new Appointment();
        $appointment->code       = AppointmentService::getCode();
        $appointment->patient_id = $patient->id;
        $appointment->qms_no     = AppointmentService::getQMS();
        $appointment->save();
        return redirect()->route('frontend.home.done', $appointment->code)->with('success', __('Queue Number is :qms', ['qms' => $appointment->qms_format]));
    }

    public function done($code){


        $appointment = Appointment::where([
            'code' => $code
        ])
            ->whereDate('created_at', Carbon::today())
            ->first();

        if(!$appointment){
            return redirect()->route('frontend.index')->with('error', __('Invalid appointment code: :code', ['code' => $code]));
        }

        return view('frontend.done', compact('appointment'));

    }

}
