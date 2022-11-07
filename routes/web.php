<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\AssignTeacherController;
use App\Http\Controllers\TeamMateController;
use App\Http\Controllers\ProjectIdeaController;
use App\Http\Controllers\ProjectController;


Route::get('register-student', [AuthController::class, 'register_student']);
Route::get('register-teacher', [AuthController::class, 'register_teacher']);
Route::post('register-store', [AuthController::class, 'registerstore']);
Route::get('login', [AuthController::class, 'login']);
Route::post('login-store', [AuthController::class, 'loginstore']);
Route::get('logout', [AuthController::class, 'logout'])->name("logout");


Route::group(['middleware' => 'checkLoggedIn'], function () {
    Route::get('/', [AuthController::class, 'dashboard']);
});

Route::group(['middleware' => 'checkIfAdmin'], function () {

    // Session
    Route::get('create-session', [SessionController::class, 'create']);

    Route::post('store-session', [SessionController::class, 'store']);

    Route::get('sessions', [SessionController::class, 'list']);

    Route::get('edit-session/{id}', [SessionController::class, 'edit']);

    Route::post('update-session/{id}', [SessionController::class, 'update']);

    Route::get('delete-session/{id}', [SessionController::class, 'delete']);


    // course
    Route::get('courses', [CourseController::class, 'list']);

    Route::get('create-course', [CourseController::class, 'create']);

    Route::post('store-course', [CourseController::class, 'store']);

    Route::get('edit-course/{id}', [CourseController::class, 'edit']);

    Route::post('update-course/{id}', [CourseController::class, 'update']);

    Route::get('delete-course/{id}', [CourseController::class, 'delete']);


    // teacher
    Route::get('assign-teacher', [AssignTeacherController::class, 'list']);

    Route::get('create-assign-teacher', [AssignTeacherController::class, 'create']);
    Route::post('store-assign-teacher', [AssignTeacherController::class, 'store']);

    Route::get('edit-assign-teacher/{id}', [AssignTeacherController::class, 'edit']);

    Route::post('update-assign-teacher/{id}', [AssignTeacherController::class, 'update']);
    Route::get('delete-assign-teacher/{id}', [AssignTeacherController::class, 'delete']);
});

Route::group(['middleware' => 'checkIfStudent'], function () {
      // project form
    Route::get('projects',[ProjectController::class,'list']);
    Route::get('create-project',[ProjectController::class,'create']);
    Route::post('store-project',[ProjectController::class, 'store']);  
    Route::get('edit-project/{id}', [ProjectController::class, 'edit']);

    Route::post('update-project/{id}', [ProjectController::class, 'update']);
    Route::get('delete-project/{id}', [ProjectController::class, 'delete']);
});
