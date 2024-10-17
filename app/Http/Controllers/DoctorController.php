<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Doctor;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function add_doctor(){
        $departments = Department::all();
        $doctors = Doctor::paginate(15);
        return view('doctor.add_doctor',[
            'departments'=>$departments,
            'doctors'=>$doctors,
        ]);
    }
    public function store_doctor(Request $request){
        $request->validate([
            'department_id'=>'required',
            'name'=>'required',
            'phone'=>'required',
            'fee'=>'required',
        ]);
        Doctor::insert([
            'department_id'=>$request->department_id,
            'name'=>$request->name,
            'phone'=>$request->phone,
            'fee'=>$request->fee,
            'department_id'=>$request->department_id,
            'created_at'=>Carbon::now(),
        ]);
        return back()->with('success','Doctor Added');
    }
    public function edit_doctor($id){
        $departments = Department::all();
        $doctors = Doctor::find($id);
        return view('doctor.edit_doctor',[
            'departments'=>$departments,
            'doctors'=>$doctors,
        ]);
    }
    public function update_doctor(Request $request,$id){
        Doctor::find($id)->update([
            'department_id'=>$request->department_id,
            'name'=>$request->name,
            'phone'=>$request->phone,
            'fee'=>$request->fee,
            'department_id'=>$request->department_id,
            'updated_at'=>Carbon::now(),
        ]);
        return back()->with('success','Doctor Updated');
    }
    public function delete_doctor($id){
        Doctor::find($id)->delete();
        return back()->with('delete','Doctor Delete Successfully');
    }
}
