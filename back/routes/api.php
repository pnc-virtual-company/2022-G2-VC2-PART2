<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\LoginController;
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


// teacher routes
Route::post('/user/login', [LoginController::class, 'userLogin']);


// student route
Route::apiResource('students',StudentController::class);
Route::apiResource('teachers',TeacherController::class);
Route::put('student_update/{id}',[StudentController::class,'updateStudent']);
Route::put('teacher_update/{id}',[TeacherController::class,'update_teacher']);
Route::put('student_status/{id}', [StudentController::class,'updateStatus']);