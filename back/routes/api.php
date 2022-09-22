<?php

use App\Http\Controllers\CoordinatorController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\SendEmailController;
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

Route::group(['middleware' => ['auth:sanctum']], function () {

    // student route
    Route::get('get_student_follwing_up/', [StudentController::class, 'get_student_follwing_up']);
    Route::get('get_student_display_follow_up/', [StudentController::class, 'get_student_display_follow_up']);
    Route::get('students/get', [StudentController::class, 'get_students']);
    Route::get('students/get/{id}', [StudentController::class, 'get_student_by_user_id']);
    Route::get('students/get_by_id/{id}',[StudentController::class, 'get_student_by_id']);
    Route::post('students/create', [StudentController::class, 'create_student']);
    Route::put('students/update/{id}', [StudentController::class, 'update_student']);
    Route::delete('students/delete/{id}', [StudentController::class, 'delete_student']);
    Route::post('students/forgot_password', [StudentController::class, 'forgot_password']);
    Route::put('update_img_user/{id}', [StudentController::class, 'update_user_img']);
    // send mail to student
    Route::post('send/email', [SendEmailController::class, 'send_mail']);

    // teacher routes
    Route::get('teachers/get', [TeacherController::class, 'get_teachers']);
    Route::get('teachers/get/{id}', [TeacherController::class, 'get_teacher_by_id']);
    Route::get('teachers/get_teacher_id/{id}', [TeacherController::class, 'get_id_teacher']);
    Route::post('teachers/create', [TeacherController::class, 'create_teacher']);
    Route::put('teachers/update/{id}', [TeacherController::class, 'update_teacher']);
    Route::delete('teachers/delete/{id}', [TeacherController::class, 'delete_teacher']);
    Route::put('teachers/update_tutor/{id}', [StudentController::class,'update_tutor']);
Route::put('teachers/update_status/{id}', [StudentController::class, 'update_status']);

    // comment route
    Route::post('comments/add', [CommentController::class, 'add_comments']);
    Route::get('comments/get', [CommentController::class, 'get_comment_by_id']);
    // coordinator Routes
    Route::get('coordinators/get/{id}', [CoordinatorController::class, 'get_coordinator_first']);

    // tutor route
    Route::post('sendTutor/email', [SendEmailController::class, 'mail_tutor']);
    Route::post('import_file', [StudentController::class,'import']);
});
// users routes
Route::post('/user/login', [LoginController::class, 'userLogin']);
Route::post('sendMail', [SendEmailController::class, 'forgot_password']);
Route::put('forgot_password/{id}', [SendEmailController::class, 'update_password']);
Route::post('confirmCode', [SendEmailController::class, 'confirm_code']);
