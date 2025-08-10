<?php

use Illuminate\Http\Request;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get("/status", function(){
    return response()->json(["status" => "Api is running"], 200);
});

Route::apiResource("clients", \App\Http\Controllers\ClientController::class);

// auth routes
Route::post("/login", [\App\Http\Controllers\AuthController::class, "login"]);