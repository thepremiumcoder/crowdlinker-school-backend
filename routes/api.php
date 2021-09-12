<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\StudentController;
use App\Http\Controllers\AuthController;

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

//User Registration
Route::post('register', [AuthController::class, 'register']);

//User Login
Route::post('login', [AuthController::class, 'login']);

//List Students
Route::get('students', [StudentController::class, 'index']);

//Add New Student
Route::post('/add-student', [StudentController::class, 'store']);

//Update Student Data
Route::get('/edit-student/{id}', [StudentController::class, 'edit']);
Route::put('update-student/{id}', [StudentController::class, 'update']);

//Delete Student Data
Route::delete('delete-student/{id}', [StudentController::class, 'destroy']);


/**
 * Auth Protected Routes.
 */
Route::middleware('auth:sanctum')->group(function () {
    //Return information of the logged-in/authenticated User
    Route::get('user', [AuthController::class, 'user']);

    //User Logout
    Route::post('logout', [AuthController::class, 'logout']);
});