<?php

use App\Http\Controllers\Api\Authentication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware(['auth:sanctum','admin'])->group(function (){
  
});
Route::middleware(['auth:sanctum','superAdmin'])->group(function (){
  
});

Route::post('/register', [Authentication::class,"register"]);
Route::post('/login', [Authentication::class,"login"]);