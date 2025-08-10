<?php

use Illuminate\Http\Request;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\AuthController;
use App\Http\Services\ApiResponse;
use Illuminate\Support\Facades\Route;

Route::get("/status", function(){
    return ApiResponse::success("API is running");
});

Route::apiResource("clients", \App\Http\Controllers\ClientController::class);

// auth routes
Route::post("/login", [\App\Http\Controllers\AuthController::class, "login"]);