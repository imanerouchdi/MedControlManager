<?php

use App\Http\Controllers\HomeController;
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

// Route::get('/', function () {
//     return view('AdminPanel.adminLayout');
// });
Route::get('/',[HomeController::class,'index']);
Route::get('/home',[HomeController::class,'redirect']);


Route::get('/go', function () {
    return view('AdminPanel.adminLayout');
});
Route::get('/rdv', function () {
    return view('rendez-vous');
});
Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])
    ->group(function () {
        Route::get('/adminLayout', function () {
            return view('AdminPanel.adminLayout');
        })->name('adminLayout');
});
