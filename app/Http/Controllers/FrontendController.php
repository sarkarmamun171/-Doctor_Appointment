<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
class FrontendController extends Controller
{
    public function index(){
        return view('frontend.index');
    }
    public function doctor_list(){
        $doctors = Doctor::paginate(10);
        return view('frontend.doctor_list',[
            'doctors'=>$doctors,
        ]);
    }
}
