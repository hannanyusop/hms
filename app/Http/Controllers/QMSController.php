<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
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

        $check = Appointment::where([
            'checked_by' => null
        ])
            ->whereDate('created_at', Carbon::today())
            ->orderBy('qms_no', 'ASC')
            ->first();

        if(!$check){
            return redirect()->back()->with('error', __('No queue!'));
        }

        $check->update(['checked_by' => auth()->user()->id]);
        #qms service calling
        return redirect()->back()->with('success', __('Your patient queue number is :qms', ['qms' => $check->qms_format]));
    }

    public function pharmacyCall(){

        $check = Appointment::where([
            ['checked_by', '!=', null],
            'pharmacies_id' => null
        ])
            ->whereDate('created_at', Carbon::today())
            ->orderBy('qms_no', 'ASC')
            ->first();

        if(!$check){
            return redirect()->back()->with('error', __('No queue!'));
        }

        $check->update(['pharmacies_id' => auth()->user()->id]);
        #qms service calling
        return redirect()->back()->with('success', __('Your patient queue number is :qms', ['qms' => $check->qms_format]));
    }
}
