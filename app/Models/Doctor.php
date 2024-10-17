<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function rel_to_department(){
        return $this->belongsTo(Department::class,'department_id');
    }
}
