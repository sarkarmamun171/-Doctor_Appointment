<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Doctor;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function add_appointment(){
        $departments = Department::all();
        $doctors = Doctor::all();
        return view('frontend.appointment.add_appointment',[
            'departments'=>$departments,
            'doctors'=>$doctors,
        ]);
    }
   
}
