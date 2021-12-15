<?php

namespace App\Services;

use App\Models\Appointment;
use App\Models\Patient;
use Carbon\Carbon;
use Illuminate\Support\Str;

class AppointmentService
{
    const pending = 0,checking =1,done_checking =2, pharmacy = 3,completed =4;
    public static function myActive(){

        return Appointment::whereDate('created_at', Carbon::today())
            ->when(auth()->user()->role == UserService::doctor, function ($q){
                $q->where('checked_by', auth()->user()->id)
                    ->where('completed_status', AppointmentService::checking);
            })
            ->when(auth()->user()->role == UserService::pharmacy, function ($q){
                $q->where('pharmacies_id', auth()->user()->id)
                    ->where('completed_status', AppointmentService::pharmacy);
            })
            ->orderBy('qms_no', 'ASC')
            ->get();

    }
    public static function doctorPending(){

        return Appointment::where([
            'checked_by' => null
        ])
            ->whereDate('created_at', Carbon::today())
            ->orderBy('qms_no', 'ASC')
            ->get();

    }
    public static function getCode(){

        do{
            $code = strtoupper(Str::random(8));

            $app = Appointment::where('code', $code)->first();

        }while($app);


        return $code;
    }

    public static function getQMS(){

        $last_app = Appointment::whereDate('created_at', Carbon::today())
            ->orderBy('qms_no', 'DESC')
            ->first();

        return ($last_app)? $last_app->qms_no+1 : 1;
    }

}
