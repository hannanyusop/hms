<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    public function heirs(){
        return $this->hasMany(PatientHasHeir::class, 'patient_id', 'id');
    }

}
