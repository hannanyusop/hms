<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    public function heirs(){
        return $this->hasMany(PatientHasHeir::class, 'patient_id', 'id');
    }

    public function getIdentityNumberAttribute(){

        return $this->no_ic ?? $this->no_passport;
    }

    public function getCardNoFormatAttribute(){
        return str_pad($this->card_no, 8, '0', STR_PAD_LEFT);
    }

    public function getAgeAttribute(){
        return Carbon::parse($this->dob)->diffInMonths(Carbon::today());
    }

}
