<?php

namespace App\Services;

use App\Models\Patient;

class PatientService
{

    public static function generateCardNo(){

        $patient = Patient::orderBy('id', 'DESC')->first();

        return ($patient)? $patient->id+1 : 1;
    }

    public static function nationality($key = null){

        $nationalities = [
            1 => 'Malaysia',
            2 => 'Algeria'
        ];

        if(is_null($key)){
            return $nationalities;
        }

        return $nationalities[$key] ?? __('Invalid Nationality');
    }

}
