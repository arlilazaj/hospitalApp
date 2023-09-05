<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homeController;
use App\Http\Controllers\AdminController;
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
Route::get('/',[homeController::class,'index']);
    
Route::get('/home',[homeController::class,'redirect']);
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
Route::get('/add_doctor',[AdminController::class,'addview']);
Route::post('/upload_doctor',[AdminController::class,'upload']);
Route::post('/add_appointment',[homeController::class,'appointment']);
Route::get('/my_appointment',[homeController::class,'my_appointment']);
Route::get('/cancel_appointment/{id}',[homeController::class,'cancel_appointment']);
Route::get('/showAppointment',[AdminController::class,'showAppointment']);
Route::get('/approved/{id}',[AdminController::class,'approved']);
Route::get('/canceled/{id}',[AdminController::class,'canceled']);
Route::get('/showDoctor',[AdminController::class,'showDoctor']);
Route::get('/deleteDoctor/{id}',[AdminController::class,'deleteDoctor']);
Route::get('/updateDoctor/{id}',[AdminController::class,'updateDoctor']);
Route::post('/editDoctor/{id}',[AdminController::class,'editDoctor']);

