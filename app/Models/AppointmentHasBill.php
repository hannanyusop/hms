<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppointmentHasBill extends Model
{
    use HasFactory;

    protected $fillable = [
        'total'
    ];

    public function items(){
        return $this->hasMany(BillItem::class, 'bill_id', 'id');
    }
}
