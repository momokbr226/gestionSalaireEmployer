<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;


Route::get(uri: '/', action: [AuthController::class, 'login'])->name(name: 'login');
Route::post(uri: '/login', action: [AuthController::class, 'HandleLogin'])->name(name: 'HandleLogin');


/*ROUTE <SECURISE>

Route::get(uri: '/dashboard', action: function () {
    return view(view: 'dashboard');
})->name(name: 'dashboard')->middleware(middleware: 'auth');*/