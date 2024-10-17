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
    public function getDoctors(Request $request)
    {
        $doctors = Doctor::where('department_id', $request->department_id)->get();
        return response()->json($doctors);
    }

    public function getDoctorInfo(Request $request)
    {
        $doctor = Doctor::find($request->doctor_id);

        if ($doctor) {
            $isAvailable = $doctor->is_available;
            $message = $isAvailable ? 'Doctor is available' : 'Doctor is not available';
            return response()->json([
                'fee' => $doctor->fee,
                'isAvailable' => $isAvailable,
                'message' => $message
            ]);
        }

        return response()->json(['error' => 'Doctor not found'], 404);
    }

}
