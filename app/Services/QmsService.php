<?php

namespace App\Services;

use App\Models\Appointment;
use App\Models\CallingSystem;
use App\Models\Patient;
use Carbon\Carbon;
use Illuminate\Support\Str;

class QmsService
{
    public static function insert($text){

        $check = CallingSystem::where('speech_text', $text)
            ->whereDate('created_at', Carbon::today())
            ->first();

        if(!$check){
            $cs = new CallingSystem();
            $cs->speech_text = $text;
            $cs->save();
        }

        return true;
    }

}
