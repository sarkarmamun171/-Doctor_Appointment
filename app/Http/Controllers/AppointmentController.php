<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Department;
use App\Models\Doctor;
use App\Models\Patient;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function add_appointment()
    {
        $departments = Department::all();
        $doctors = Doctor::all();
        $appointments = Appointment::all();
        return view('frontend.appointment.add_appointment', [
            'departments' => $departments,
            'doctors' => $doctors,
            'appointments' => $appointments,
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
    public function appointment_store(Request $request)
    {
        $request->validate([
            'appointment_no' => 'required',
            'appointment_date' => 'required',
            'department_id' => 'required',
            'doctor_id' => 'required',
            'fee' => 'required',
        ]);
        Appointment::insert([
            'appointment_no' => $request->appointment_no,
            'appointment_date' => $request->appointment_date,
            'department_id' => $request->department_id,
            'doctor_id' => $request->doctor_id,
            'fee' => $request->fee,
            'created_at' => Carbon::now(),
        ]);
        $doctorAppointments = Appointment::where('doctor_id', $request->doctor_id)
            ->whereDate('appointment_date', $request->appointment_date)
            ->count();

        if ($doctorAppointments >= 2) {
            return back()->with('error', 'Doctor is not available for the selected date.');
        }
        return back();
    }
    public function appointment_delete($id)
    {
        Appointment::find($id)->delete();
        return back();
    }
}
