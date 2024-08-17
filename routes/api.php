<?php

use App\Http\Controllers\Api\Authentication;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\catgori_supController;
use App\Http\Controllers\Api\ServicesController;
use App\Models\catgori_sup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware(['auth:sanctum','admin'])->group(function (){
    Route::post('/category/store', [CategoryController::class,"store"]);
    Route::get('/category/show', [CategoryController::class,"index"]);
    Route::get('/category/show/{id}', [CategoryController::class,"show"]);
    Route::put('/category/update/{id}', [CategoryController::class,"update"]);
    //////////////////////////////////////////////////
    // Route::post('/catgori_sup/store', [catgori_sup::class,"store"]);
    // Route::get('/catgori_sup/show', [catgori_sup::class,"index"]);
    // Route::get('/catgori_sup/show/{id}', [catgori_sup::class,"show"]);
    // Route::put('/catgori_sup/update/{id}', [catgori_sup::class,"update"]);

});
Route::middleware(['auth:sanctum','superAdmin'])->group(function (){
    // Route::post('/Services/store', [ServicesController::class,"store"]);
    // Route::get('/Services/show', [ServicesController::class,"index"]);
    // // Route::get('/Services/show/{id}', [ServicesController::class,"show"]);
    // Route::put('/Services/update/{id}', [ServicesController::class,"update"]);
    // Route::delete('/Services/delete/{id}', [ServicesController::class,"destroy"]);

    //////////////////////////////////////////////////////////////
    Route::post('/category/store', [CategoryController::class,"store"]);
    Route::get('/category/show', [CategoryController::class,"index"]);
    Route::get('/category/show/{id}', [CategoryController::class,"show"]);
    Route::put('/category/update/{id}', [CategoryController::class,"update"]);
    Route::delete('/category/delete/{id}', [CategoryController::class,"destroy"]);
    //////////////////////////////////////////////////
    Route::post('/catgori_sup/store', [catgori_supController::class,"store"]);
    Route::get('/catgori_sup/show', [catgori_supController::class,"index"]);
    Route::get('/catgori_sup/show/{id}', [catgori_supController::class,"show"]);
    Route::put('/catgori_sup/update/{id}', [catgori_supController::class,"update"]);
    Route::delete('/catgori_sup/delete/{id}', [catgori_supController::class,"destroy"]);

});
Route::middleware(['auth:sanctum','user'])->group(function (){
    Route::post('/Services/store', [ServicesController::class,"store"]);
    Route::get('/Services/show', [ServicesController::class,"index"]);
    // Route::get('/Services/show/{id}', [ServicesController::class,"show"]);
    Route::put('/Services/update/{id}', [ServicesController::class,"update"]);
    Route::delete('/Services/delete/{id}', [ServicesController::class,"destroy"]);
});

Route::post('/register', [Authentication::class,"register"]);
Route::post('/login', [Authentication::class,"login"]);





