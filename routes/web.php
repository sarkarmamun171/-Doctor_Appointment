<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('layouts.admin');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

//Frontend View
Route::get('/',[FrontendController::class,'index'])->name('index');
Route::get('doctor/list',[FrontendController::class,'doctor_list'])->name('doctor.list');
//Departments
Route::get('add/department',[DepartmentController::class,'add_department'])->name('add.department');
Route::post('add/department/store',[DepartmentController::class,'store_department'])->name('store.department');
Route::get('add/department/edit/{id}',[DepartmentController::class,'edit_department'])->name('edit.department');
Route::post('add/department/update/{id}',[DepartmentController::class,'update_department'])->name('update.department');
Route::get('add/department/delete/{id}',[DepartmentController::class,'delete_department'])->name('delete.department');

//Doctor Details
Route::get('add/doctor',[DoctorController::class,'add_doctor'])->name('add.doctor');
Route::post('store/doctor',[DoctorController::class,'store_doctor'])->name('store.doctor');
Route::get('doctor/edit/{id}',[DoctorController::class,'edit_doctor'])->name('edit.doctor');
Route::post('doctor/update/{id}',[DoctorController::class,'update_doctor'])->name('update.doctor');
Route::get('doctor/delete/{id}',[DoctorController::class,'delete_doctor'])->name('delete.doctor');

//Appointment
Route::get('/appointment/add',[AppointmentController::class,'add_appointment'])->name('add_appointment');



