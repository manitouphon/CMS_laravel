<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\StaffController;
use Illuminate\Support\Facades\Route;

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

Route::prefix('auth')->group(function () {
    Route::middleware(['auth:sanctum'])->group(function () {
        Route::post('/user-profile', [AuthController::class, 'profile']);
    });
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/forget-password', [ForgotPasswordController::class, 'sendPasswordResetEmail']);
    Route::post('/reset-password', [ResetPasswordController::class, 'passwordResetProcess']);
});

Route::group(['middleware' => ['auth:sanctum']], function () {
    //index
    Route::get('Doctor', [StaffController::class, 'getDoctor']);
    Route::get('Pharmacist', [StaffController::class, 'getPharmacist']);
    Route::get('Receptionist', [StaffController::class, 'getReceptionist']);

    //Update
    Route::put('Doctor/{id}', [StaffController::class, 'updateDoctor']);
    Route::put('Pharmacist/{id}', [StaffController::class, 'updatePharmacist']);
    Route::put('Receptionist/{id}', [StaffController::class, 'updateReceptionist']);

    //Find
    Route::get('Doctor/{id}', [StaffController::class, 'findDoctor']);
    Route::get('Pharmacist/{id}', [StaffController::class, 'findPharmacist']);
    Route::get('Receptionist/{id}', [StaffController::class, 'findReceptionist']);

    //Add
    Route::post('Doctor', [StaffController::class, 'addDoctor']);
    Route::post('Pharmacist', [StaffController::class, 'addPharmacist']);
    Route::post('Receptionist', [StaffController::class, 'addReceptionist']);

    //Destroy
    Route::delete('Doctor/{id}', [StaffController::class, 'destroyDoctor']);
    Route::delete('Pharmacist/{id}', [StaffController::class, 'destroyPharmacist']);
    Route::delete('Receptionist/{id}', [StaffController::class, 'destroyReceptionist']);

    Route::get('patient', [PatientController::class, 'getPatient']);
    Route::get('patient/{pat_id}', [PatientController::class, 'findPatient']);
    Route::post('patient/{pat_id}', [PatientController::class, 'updatePatient']);
    Route::post('patient}', [PatientController::class, 'addPatient']);

});
