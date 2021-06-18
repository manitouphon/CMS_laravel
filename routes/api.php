<?php


use App\Http\Controllers\LoginController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\StaffController;
use Illuminate\Http\Request;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/login', [LoginController::class,'login']);
Route::post('/register',[RegisterController::class,'register']);


Route::group(['middleware'=>['auth:sanctum']], function () {
    Route::get('Doctor', [StaffController::class, 'getDoctor']);
    Route::get('Pharmacist', [StaffController::class, 'getPharmacist']);
    Route::get('Receptionist', [StaffController::class, 'getReceptionist']);

    Route::patch('Doctor/{id}', [StaffController::class,'updateDoctor']);
    Route::patch('Pharmacist/{id}', [StaffController::class,'updatePharmacist']);
    Route::patch('Receptionist/{id}', [StaffController::class,'updateReceptionist']);

    Route::get('Doctor/{id}', [StaffController::class,'findDoctor']);
    Route::get('Pharmacist/{id}', [StaffController::class,'findPharmacist']);
    Route::get('Receptionist/{id}', [StaffController::class,'findReceptionist']);

    Route::post('addDoctor',[StaffController::class,'addDoctor']);
    Route::post('addPharmacist',[StaffController::class,'addPharmacist']);
    Route::post('addReceptionist',[StaffController::class,'addReceptionist']);

    Route::delete('deleteDoctor/{id}', [StaffController::class,'destroyDoctor']);
    Route::delete('deletePharmacist/{id}', [StaffController::class,'destroyPharmacist']);
    Route::delete('deleteReceptionist/{id}', [StaffController::class,'destroyReceptionist']);


    Route::get('patient',[PatientController::class,'getPatient']);
    Route::get('patient/{pat_id}',[PatientController::class,'getPatient']);
});


