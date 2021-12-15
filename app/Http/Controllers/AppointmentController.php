<?php

namespace App\Http\Controllers;

use App\Http\Requests\Appointment\AppointmentStoreRequest;
use App\Http\Requests\Appointment\PharmacyCompletedRequest;
use App\Models\Appointment;
use App\Models\AppointmentHasBill;
use App\Models\AppointmentHasDrug;
use App\Models\BillItem;
use App\Models\Patient;
use App\Services\AppointmentService;
use App\Services\QmsService;
use App\Services\UserService;
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
            'completed_status' => AppointmentService::checking
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
            'completed_status' => AppointmentService::checking
        ])->find(decrypt($id));


        if(!$appointment){
            return redirect()->back()->with('error', __('Invalid appointment.'));
        }

        $appointment->completed_status = AppointmentService::done_checking;
        $appointment->save();

        return  redirect()->route('frontend.user.dashboard')->with('success', __('Appointment successful'));
    }

    public function pharmacy($id){

        $appointment = Appointment::where([
            'pharmacies_id'       => auth()->user()->id,
            'completed_status'    => AppointmentService::pharmacy
        ])->find(decrypt($id));

        if(!$appointment){
            return redirect()->back()->with('error', __('Invalid appointment.'));
        }

        return view('appointment.pharmacy', compact('appointment'));
    }

    public function pharmacyCompleted(PharmacyCompletedRequest $request, $id){

        $appointment = Appointment::where([
            'pharmacies_id'       => auth()->user()->id,
            'completed_status'    => AppointmentService::pharmacy
        ])->find(decrypt($id));

        if(!$appointment){
            return redirect()->back()->with('error', __('Invalid appointment.'));
        }

        foreach ($request->price as $key => $price){

            $ahd = AppointmentHasDrug::find($key);
            $ahd->after_adjustment = $price;
            $ahd->qty = $request->qty[$key];
            $ahd->save();
        }

        $ahb = new AppointmentHasBill();
        $ahb->code = AppointmentService::getCode();
        $ahb->appointment_id = $appointment->id;
        $ahb->payment_status = 1;
        $ahb->total          = 0;
        $ahb->generated_by   = $ahb->received_by = auth()->user()->id;
        $ahb->save();

        foreach ($appointment->drugs as $ah_drug){
            $bill_items = new BillItem();
            $bill_items->bill_id = $ahb->id;
            $bill_items->item    = $ah_drug->type->code." ".$ah_drug->type->name;
            $bill_items->price_per_item = $ah_drug->after_adjustment;
            $bill_items->qty            = $ah_drug->qty;
            $bill_items->total_price    = $ah_drug->after_adjustment*$ah_drug->qty;
            $bill_items->save();
            $ahb->increment('total', $bill_items->total_price);
        }

        $appointment->completed_status = AppointmentService::completed;
        $appointment->save();

        return  redirect()->route('appointment.receipt', encrypt($appointment->id))->with('success', __('Appointment completed.'));
    }

    public static function receipt($id){

        $appointment = Appointment::where('completed_status', AppointmentService::completed)->find(decrypt($id));
        return view('appointment.receipt', compact('appointment'));
    }

}
