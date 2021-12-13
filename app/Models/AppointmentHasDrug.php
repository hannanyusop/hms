<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppointmentHasDrug extends Model
{
    use HasFactory;

    public function type(){
        return $this->hasOne(Drug::class, 'id', 'drug_id');
    }
}
