<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ConsultationController;
use App\Http\Controllers\MedecinController;
use App\Http\Controllers\AssistantController;
use App\Http\Controllers\RendezVousController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AppointmentAdminController;
use App\Http\Controllers\AppointmentUserController;
use App\Http\Controllers\BussinessHourController;
use App\Http\Controllers\FullCalendarController;


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



//////////////////////////////////////////////// ------ TYPE USER ------ ////////////////////////////////////////////////
Route::get('/Admin-dashboard',[HomeController ::class, 'dashboard'])->name('Admin-dashboard');
Route::get('/',[HomeController ::class, 'index'])->name('index');

// Route::get('/index',[HomeController::class,'page'])->name('page');
ROUTE::get('/rendezVous',[RendezVousController::class,'index'])->name('rendez-vous');// ancient route


Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])
    ->group(function () {
        // Route::get('/adminLayout', function () {
        //     return view('AdminPanel.adminLayout');
        // })->name('adminLayout');
});



//////////////////////////////////////////////// ------ Patient ------ ////////////////////////////////////////////////


//////////////////////////////////////////////// ------ Patient ------ ////////////////////////////////////////////////

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles',RoleController::class);
    Route::resource('users',UserController::class);
    Route::resource('consultation',ConsultationController::class);
    Route::resource('patient',PatientController::class);
    Route::resource('fullcalendar',FullCalendarController::class);
    Route::resource('appointmentAdmin',AppointmentAdminController::class);
    Route::resource('appointmentUser',AppointmentUserController::class);
    Route::get('/available/{date}',[AppointmentUserController::class, 'availableHours']);
    

    // Route::resource('patient',PatientController::class);
    // Route::post('/patient',[PatientController::class,'store'])->name('patient.create');
    // Route::get('/patient',[PatientController::class,'index'])->name('patient.index');
});
Route::resource('rendez-vous',BussinessHourController::class);

Route::get('/user', [HomeController::class, 'index'])->name('user');
Route::get('/landing',[LoginController::class, 'redirectodashboard'])->name('landing');



Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])->group(function () {
    // Route::get('/dashboard', function () {
    //     return view('dashboard');
    // })->name('dashboard');
// Route::get('/index',[HomeController ::class, 'index'])->name('index');





});

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
