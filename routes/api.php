<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\BedAllotmentController;
use App\Http\Controllers\BloodBagController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\WorkingScheduleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestingController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */
/* ==================Authentication Controller=============== */
Route::prefix('auth')->group(function () {
    Route::middleware(['auth:sanctum'])->group(function () {
        Route::get('/user-profile', [AuthController::class, 'profile']);
    });
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/forget-password', [ForgotPasswordController::class, 'sendPasswordResetEmail']);
    Route::post('/reset-password', [ResetPasswordController::class, 'passwordResetProcess']);
});

/* ==========Patient Controller================== */
Route::prefix('patient')->middleware("auth:sanctum")->group(function () {
    /* ==========Patient Controller================== */
    Route::get('/', [PatientController::class, 'getPatient']);
    Route::get('{pat_id}', [PatientController::class, 'getPatient']);
    Route::post("/", [PatientController::class, 'addPatient']);
    Route::put("/{pat_id}", [PatientController::class, 'updatePatient']);
    Route::delete("/{pat_id}", [PatientController::class, 'deletePatient']);

});

//Admin Only Middleware (Sanctum)
Route::group(["middleware" => "auth:sanctum"], function () {
    /* ================Staff controller======================== */
    Route::resource('/staff', StaffController::class);
    /* ================Bed Allotment controller======================== */
    Route::resource('/bed-allotment', BedAllotmentController::class);
    /* ================Medicine controller======================== */
    Route::resource('/medicine', MedicineController::class);
    /* ================Birth report Controller======================== */
    /* ================Blood Bag Controller======================== */
    Route::post('/blood_bag', [BloodBagController::class, 'update']);
    /* ==========Working Schedule Controller================== */
    Route::resource('/working-schedule', WorkingScheduleController::class);
});



//=======================Testing Purpose Only =================

Route::resource('test', TestingController::class);
