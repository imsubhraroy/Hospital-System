<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\HomeController;
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

Route::get('/home', [HomeController::class, 'home'])->name('/home');
Route::get('/', [HomeController::class, 'index']);

Route::middleware([
    'auth:sanctum'
])->group(function () {

    Route::get('/my-appointment', [AppointmentController::class, 'index']);

    Route::get('/add-doctor-view', [DoctorController::class, 'create']);
    Route::post('/add-doctor', [DoctorController::class, 'store']);

    Route::post('create-appointment', [AppointmentController::class, 'store']);
    Route::get('cancel-appointment/{id}', [AppointmentController::class, 'destroy']);
});
