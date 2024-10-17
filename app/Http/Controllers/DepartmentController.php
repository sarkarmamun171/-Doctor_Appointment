<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function add_department(){
        $departments = Department::paginate(15);
        return view('department.add_department',[
            'departments'=>$departments,
        ]);
    }
    public function store_department(Request $request){
        $request->validate([
            'name'=>'required|unique:departments'
        ]);
        Department::insert([
            'name'=>$request->name,
            'created_at'=>Carbon::now(),
        ]);
        return back()->with('success','Added in Department Successfully');
    }
    public function edit_department($id){
        $departments = Department::find($id);
        return view('department.edit_department',[
            'departments'=>$departments,
        ]);
    }
    public function update_department(Request $request,$id){
        $request->validate([
            'name'=>'required'
        ]);
        Department::find($id)->update([
            'name'=>$request->name,
            'updated_at'=>Carbon::now(),
        ]);
        return back()->with('success','Updated in Department Successfully');
    }
    public function delete_department($id){
        Department::find($id)->delete();
        return back()->with('delete','Deleted Successfully');
    }
}
