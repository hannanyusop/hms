<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'room',
        'completed_status',
        'checked_by',
        'pharmacies_id'
    ];

    public function getQmsFormatAttribute(){
        return str_pad($this->qms_no, 4, 0, STR_PAD_LEFT);
    }

    public function patient(){
        return $this->hasOne(Patient::class,'id', 'patient_id');
    }

    public function diseases(){
        return $this->hasMany(AppointmentHasDisease::class, 'appointment_id', 'id');
    }

    public function drugs(){
        return $this->hasMany(AppointmentHasDrug::class, 'appointment_id', 'id');
    }

    public function bill(){
        return $this->hasOne(AppointmentHasBill::class, 'appointment_id', 'id');
    }
}
