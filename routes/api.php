<?php

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

//routes for teacher
Route::middleware(['auth:sanctum','role:teacher'])->group(function(){
    Route::post('/class/create',[TeacherController::class,'generateQr']);
    Route::get('/class/{id}/attendance',[TeacherController::class,'showAllAttendance']);
});

//routes for student
Route::middleware(['auth:sanctum','role:student'])->group(function(){
    Route::post('/attendance/mark',[StudentController::class,'markAttendance']);
    Route::get('/attendance/my',[StudentController::class,'showMyAttendance']);
});


