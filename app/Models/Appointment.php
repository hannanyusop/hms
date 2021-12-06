<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'checked_by',
        'pharmacies_id'
    ];

    public function getQmsFormatAttribute(){
        return str_pad($this->qms_no, 4, 0, STR_PAD_LEFT);
    }

    public function patient(){
        return $this->hasOne(Patient::class,'id', 'patient_id');
    }
}
