<?php

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\UserController;
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
Route::get('/news', [NewsController::class, 'index']);
Route::get('/doctors', [DoctorController::class, 'index']);
Route::get('/contact-us', [ContactController::class, 'index']);
Route::get('/about-us', [AboutUsController::class, 'index']);

Route::middleware([
    'auth:sanctum'
])->group(function () {

    Route::middleware([
        'adminVerify'
    ])->group(function () {
        Route::get('/add-doctor-view', [DoctorController::class, 'create']);
        Route::post('/add-doctor', [DoctorController::class, 'store']);
        Route::get('/admin-view-doctors', [DoctorController::class, 'index2']);
        Route::get('/delete-doctor/{id}', [DoctorController::class, 'destroy']);
        Route::get('/edit-doctor/{id}', [DoctorController::class, 'show']);
        Route::post('/update-doctor/{id}', [DoctorController::class, 'update']);

        Route::get('/view-appointment', [AppointmentController::class, 'index2']);
        Route::get('/approve-appointment/{id}', [AppointmentController::class, 'approve']);
        Route::get('/delete-appointment/{id}', [AppointmentController::class, 'destroy']);

        Route::get('/view-users', [UserController::class, 'index']);
        Route::get('/delete-user/{id}', [UserController::class, 'destroy']);

        Route::get('/view-contact', [ContactController::class, 'index2']);
        Route::get('/delete-contact/{id}', [ContactController::class, 'destroy']);

    });


    Route::get('/my-appointment', [AppointmentController::class, 'index']);
    Route::post('/create-appointment', [AppointmentController::class, 'store']);
    Route::post('/create-contact', [ContactController::class, 'store']);
    Route::get('/cancel-appointment/{id}', [AppointmentController::class, 'cancel']);
});
