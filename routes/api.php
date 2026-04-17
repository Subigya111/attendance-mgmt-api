<?php

use App\Http\Controllers\AdminController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::fallback(function(){
    return 'Invalid Url';
});
Route::post('/register',[AuthenticationController::class,'register']);
Route::post('/login',[AuthenticationController::class,'login']);
Route::post('/logout',[AuthenticationController::class,'logout'])->middleware('auth:sanctum');

//route for admin
Route::middleware(['auth:sanctum','role:admin'])->prefix('admin')->group(function(){
    Route::post('/make-teacher',[AdminController::class,'makeTeacher']);
});
//routes for teacher
Route::middleware(['auth:sanctum','role:teacher'])->prefix('teacher')->group(function(){
    Route::post('/class/create',[TeacherController::class,'createClass']);
    Route::get('/class/{StartClass}/attendance',[TeacherController::class,'showAllAttendance']);
});

//routes for student
Route::middleware(['auth:sanctum','role:student'])->prefix('student')->group(function(){
    Route::post('/attendance/mark',[StudentController::class,'markAttendance']);
    Route::get('/attendance/my',[StudentController::class,'showMyAttendance']);
});


