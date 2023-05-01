<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ConsultationController;
use App\Http\Controllers\MedecinController;
use App\Http\Controllers\AssistantController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AppointmentAdminController;
use App\Http\Controllers\AppointmentUserController;
use App\Http\Controllers\BussinessHourController;
use App\Http\Controllers\FullCalendarController;
use App\Http\Controllers\AllAppointmentController;
use App\Http\Controllers\DossierMedicalPatientController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//////////////////////////////////////////////// ------ Auth ------ ////////////////////////////////////////////////

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles',RoleController::class);
    Route::resource('users',UserController::class);
    Route::resource('patient',PatientController::class);
    Route::resource('fullcalendar',FullCalendarController::class);
    Route::resource('appointmentAdmin',AppointmentAdminController::class);
    Route::resource('appointmentUser',AppointmentUserController::class);
    Route::get('/available/{date}',[AppointmentUserController::class, 'availableHours']);
    Route::get('/ConfirmAppointment',[AppointmentUserController::class, 'ConfirmAppointment'])->name('ConfirmAppointment');
    
    Route::resource('consultation',ConsultationController::class);
    Route::match(['get', 'post'],'Showconsultation/{id}',[ConsultationController::class , 'Showconsultation'])->name('Showconsultation');
    Route::Post('/add',[ConsultationController::class ,'register'])->name('add');
    Route::get('/appointmentConsultation',[ConsultationController::class, 'appointmentConsultation'])->name('appointmentConsultation');
    Route::get('/print-consultation/{id}', [ConsultationController::class, 'print'])->name('consultation.print');
    Route::resource('dossierPatient',DossierMedicalPatientController::class);
    Route::get('/showAllAppointment',[AppointmentAdminController::class,'showAllAppointment'])->name('showAllAppointment');
    Route::get('/filterCIN',[AppointmentAdminController::class,'filterCIN'])->name('filterCIN');
    Route::delete('/delete',[AppointmentAdminController::class,'delete'])->name('delete');
    
    
    });

// Route::get('/landing',[LoginController::class, 'redirectodashboard'])->name('landing');
    Route::get('/Admin-dashboard',[HomeController ::class, 'dashboard'])->name('Admin-dashboard');
    Route::get('/',[HomeController ::class, 'index'])->name('index');
    Route::get('/print',[HomeController ::class, 'print'])->name('print');




// Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])->group(function () {

// });

