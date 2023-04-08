<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TypeUserController;
use App\Http\Controllers\MedecinController;
use App\Http\Controllers\SimpleUserController;
use App\Http\Controllers\AssistantController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

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

Route::get('/landing', function () {
    return view('AdminPanel.adminLayout');
});

Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');

require_once __DIR__.'/fortify.php';


Route::get('/',[App\Http\Controllers\HomeController ::class, 'index'])->name('landing');

Route::get('/typeusers',[App\Http\Controllers\TypeUserController ::class, 'index'])->name('typeusers');

Route::group(['namespace'=>'auth:sanctum'],function(){
    Route::get('/login/{type}',[App\Http\Controllers\Auth\LoginController ::class, 'loginForm'])->name('login.show');


});






Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])
    ->group(function () {
        Route::get('/adminLayout', function () {
            return view('AdminPanel.adminLayout');
        })->name('adminLayout');
});

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


/******************************************* */

// Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::post('/patient', [PatientController::class,'store'])->name('patient.create');
Route::get('/patient', [PatientController::class,'index'])->name('patient.index');
  
Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
});