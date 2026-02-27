<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::fallback(function(){
    return 'Invalid Url';
});
Route::post('/register',[AuthenticationController::class,'register']);
Route::post('/login',[AuthenticationController::class,'login']);
Route::post('/logout',[AuthenticationController::class,'logout']);

