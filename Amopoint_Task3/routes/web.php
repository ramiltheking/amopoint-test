<?php

use Illuminate\Support\Facades\Route;

Route::get('/', fn() => view('welcome'));


Route::post('/save-user-stats', [\App\Http\Controllers\StatsController::class, "storeUserStats"]);


Route::get("/login", [\App\Http\Controllers\AuthController::class, "loginPage"])->name("login");
Route::post("/login", [\App\Http\Controllers\AuthController::class, "loginUser"]);

Route::get("/dashboard", [\App\Http\Controllers\DashboardController::class, "showDashboard"])->middleware("auth");