<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use Carbon\Carbon;
class PatientController extends Controller
{
    public function store_patient(Request $request){
        $request->validate([
            'patient_name'=>'required',
            'patient_phone'=>'required',
            'total_fee'=>'required',
            'paid_amount'=>'required',
        ]);
        Patient::insert([
            'patient_name'=>$request->patient_name,
            'patient_phone'=>$request->patient_phone,
            'total_fee'=>$request->total_fee,
            'paid_amount'=>$request->paid_amount,
            'created_at'=>Carbon::now(),
        ]);
        return back();
    }
}
