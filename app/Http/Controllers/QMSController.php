<?php

namespace App\Http\Controllers;

use App\Http\Requests\Qms\SaveRoomRequest;
use App\Models\Appointment;
use App\Services\AppointmentService;
use App\Services\QmsService;
use Carbon\Carbon;
use Illuminate\Http\Request;

class QMSController extends Controller
{
    public function screen(){

        $appointments = Appointment::whereDate('created_at', Carbon::today())
            ->whereNotIn('completed_status', [AppointmentService::pending, AppointmentService::completed])
            ->whereDate('created_at', Carbon::today())
            ->orderBy('updated_at', 'DESC')
            ->limit(4)->get();

        return view('qms.screen', compact('appointments'));
    }

    public function setRoom(){

        $room = session('room', '');

        return view('qms.room', compact('room'));
    }

    public function saveRoom(SaveRoomRequest $request){

        session()->put('room', $request->room);
        return redirect()->route('frontend.user.dashboard')->with('success', 'Room set successfully');
    }

    public function doctorCall(){

        if(!\Session::has('room')){
            return redirect()->route('qms.setRoom')->with('error', 'Please set room first');
        }

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
            'checked_by' => null,
            'completed_status' => AppointmentService::pending
        ])
            ->whereDate('created_at', Carbon::today())
            ->orderBy('qms_no', 'ASC')
            ->first();

        if(!$check){
            return redirect()->back()->with('error', __('No queue!'));
        }

        $check->update([
            'checked_by'       => auth()->user()->id,
            'completed_status' => AppointmentService::checking,
            'room'             => session('room')
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

        if(!\Session::has('room')){
            return redirect()->route('qms.setRoom')->with('error', 'Please set room first');
        }

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
            'completed_status' => AppointmentService::pharmacy,
            'room'             => session('room')
        ]);

        #qms service calling
        return redirect()->back()->with('success', __('Your patient queue number is :qms', ['qms' => $check->qms_format]));
    }
}
