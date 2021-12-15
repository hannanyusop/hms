<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Services\AppointmentService;
use App\Services\QmsService;
use Carbon\Carbon;
use Illuminate\Http\Request;

class QMSController extends Controller
{
    public function screen(){

        $appointments = Appointment::whereDate('created_at', Carbon::today())
            ->orderBy('qms_no', 'ASC')
            ->get();

        return view('qms.screen', compact('appointments'));
    }
    public function doctorCall(){

        $pending = Appointment::where([
            'checked_by' => auth()->user()->id,
            'completed_status' => AppointmentService::checking
        ])
            ->whereDate('created_at', Carbon::today())
            ->first();

        if($pending){
            return redirect()->back()->with('error', __('You still have active patient.'));
        }

        $check = Appointment::where([
            'checked_by' => null
        ])
            ->whereDate('created_at', Carbon::today())
            ->orderBy('qms_no', 'ASC')
            ->first();

        if(!$check){
            return redirect()->back()->with('error', __('No queue!'));
        }

        $check->update([
            'checked_by' => auth()->user()->id,
            'completed_status' => AppointmentService::checking
        ]);
        #qms service calling
        return redirect()->back()->with('success', __('Your patient queue number is :qms', ['qms' => $check->qms_format]));
    }

    public function recall(){

        $check = Appointment::whereDate('created_at', Carbon::today())
            ->when(auth()->user()->role == "doctor", function ($q){
                $q->where('checked_by', auth()->user()->id)
                    ->where('completed_status',  AppointmentService::checking);
            })
            ->when(auth()->user()->role == "pharmacy", function ($q){
                $q->where('pharmacies_id', auth()->user()->id)
                    ->where('completed_status', AppointmentService::pharmacy);
            })
            ->orderBy('qms_no', 'ASC')
            ->first();


        if(!$check){
            return redirect()->back()->with('error', __('No active appointment!'));
        }

        QmsService::insert("$check->qms_format Bilik 5");

        return redirect()->back()->with('success', __('Calling for :qms', ['qms' => $check->qms_format]));
    }

    public function pharmacyCall(){

        $pending = Appointment::where([
            'pharmacies_id' => auth()->user()->id,
            'completed_status' => AppointmentService::done_checking
        ])
            ->whereDate('created_at', Carbon::today())
            ->first();

        if($pending){
            return redirect()->back()->with('error', __('You still have active patient.'));
        }

        $check = Appointment::where([
            ['checked_by', '!=', null],
            'pharmacies_id' => null,
            'completed_status' => AppointmentService::done_checking
        ])
            ->whereDate('created_at', Carbon::today())
            ->orderBy('qms_no', 'ASC')
            ->first();

        if(!$check){
            return redirect()->back()->with('error', __('No queue!'));
        }

        $check->update([
            'pharmacies_id' => auth()->user()->id,
            'completed_status' => AppointmentService::pharmacy
        ]);

        #qms service calling
        return redirect()->back()->with('success', __('Your patient queue number is :qms', ['qms' => $check->qms_format]));
    }
}
