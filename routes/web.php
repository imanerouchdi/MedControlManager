<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ConsultationController;
use App\Http\Controllers\TypeUserController;
use App\Http\Controllers\MedecinController;
use App\Http\Controllers\SimpleUserController;
use App\Http\Controllers\AssistantController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RendezVousController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\RdvDashboardController;


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

// Route::get('/landing', function () {
//     return view('AdminPanel.adminLayout');
// });

//////////////////////////////////////////////// ------ TYPE USER ------ ////////////////////////////////////////////////
Route::get('/adminLayout',[HomeController ::class, 'dashboard'])->name('adminLayout');
Route::get('/page',[HomeController::class,'page'])->name('page');
ROUTE::get('/',[RendezVousController::class,'index'])->name('index');

// Route::resource('calendars',CalendarController::class);


// Route::group(['namespace'=>'auth:sanctum'],function(){
//          Route::get('/login/{type}',[LoginController ::class, 'loginForm'])->name('login.show');
//  Route::get('/typeusers',[homeController ::class, 'store'])->name('typeusers');

//  Route::get('/user',[homeController::class,'index'])->name('user');
//  Route::get('/medecin',[homeController::class,'medecin'])->name('dashboard');
// Route::get('/assistant',[homeController::class,'assistant'])->name('assistant');
// });

// Route::middleware(['auth','user-access::user'])->group(function(){
//     Route::get('/landing',[homeController::class,'index'])->name('home');
// });

// Route::middleware(['auth','user-access::medecin'])->group(function(){
//     Route::get('/admin/home',[homeController::class,'medecin'])->name('admin.home');
// });

// Route::middleware(['auth','user-access::assistant'])->group(function(){
//     Route::get('/assistnt/home',[homeController::class,'assistant'])->name('assistant.home');
// });






Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])
    ->group(function () {
        Route::get('/adminLayout', function () {
            return view('AdminPanel.adminLayout');
        })->name('adminLayout');
});



//////////////////////////////////////////////// ------ Patient ------ ////////////////////////////////////////////////


//////////////////////////////////////////////// ------ Patient ------ ////////////////////////////////////////////////

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles',RoleController::class);
    Route::resource('users',UserController::class);
    Route::resource('consultation',ConsultationController::class);
    Route::resource('appointment',RdvDashboardController::class);
    Route::resource('patient',PatientController::class);
    Route::resource('calendar',CalendarController::class);

    // Route::resource('patient',PatientController::class);
    // Route::post('/patient',[PatientController::class,'store'])->name('patient.create');
    // Route::get('/patient',[PatientController::class,'index'])->name('patient.index');
});

Route::get('/user', [HomeController::class, 'index'])->name('user');
Route::get('/landing',[LoginController::class, 'redirectodashboard'])->name('landing');



// Route::get('/APP', function () {
//     return view('RdvPanel.Card-rendez-vous');
// });
// Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])
//     ->group(function () {
//         Route::get('/adminLayout', function () {
//             return view('AdminPanel.adminLayout');
//         })->name('adminLayout');
// });
// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
