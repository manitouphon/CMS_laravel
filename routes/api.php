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
    //index
    Route::get('Doctor', [StaffController::class, 'getDoctor']);
    Route::get('Pharmacist', [StaffController::class, 'getPharmacist']);
    Route::get('Receptionist', [StaffController::class, 'getReceptionist']);

    //Update
    Route::post('Doctor/{id}', [StaffController::class,'updateDoctor']);
    Route::post('Pharmacist/{id}', [StaffController::class,'updatePharmacist']);
    Route::post('Receptionist/{id}', [StaffController::class,'updateReceptionist']);

    //Find
    Route::get('Doctor/{id}', [StaffController::class,'findDoctor']);
    Route::get('Pharmacist/{id}', [StaffController::class,'findPharmacist']);
    Route::get('Receptionist/{id}', [StaffController::class,'findReceptionist']);

    //Add
    Route::post('Doctor',[StaffController::class,'addDoctor']);
    Route::post('Pharmacist',[StaffController::class,'addPharmacist']);
    Route::post('Receptionist',[StaffController::class,'addReceptionist']);

    //Destroy
    Route::delete('Doctor/{id}', [StaffController::class,'destroyDoctor']);
    Route::delete('Pharmacist/{id}', [StaffController::class,'destroyPharmacist']);
    Route::delete('Receptionist/{id}', [StaffController::class,'destroyReceptionist']);


    Route::get('patient',[PatientController::class,'getPatient']);
    Route::get('patient/{pat_id}',[PatientController::class,'findPatient']);
    Route::post('patient/{pat_id}',[PatientController::class,'updatePatient']);
    Route::post('patient}',[PatientController::class,'addPatient']);


});


