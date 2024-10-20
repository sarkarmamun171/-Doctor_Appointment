<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function rel_to_doctor(){
        return $this->belongsTo(Doctor::class,'doctor_id');
    }
}
