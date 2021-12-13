<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppointmentHasDisease extends Model
{
    use HasFactory;

    public function type(){
        return $this->hasOne(Disease::class, 'id', 'disease_id');
    }
}
