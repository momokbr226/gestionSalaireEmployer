<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmployerController;
use Illuminate\Support\Facades\Route;


Route::get(uri: '/', action: [AuthController::class, 'login'])->name(name: 'login');
Route::post(uri: '/login', action: [AuthController::class, 'HandleLogin'])->name(name: 'HandleLogin');


/*ROUTE <SECURISE*/

Route::middleware('auth')->group(function ()
{



    Route::prefix('employers')->group(function()
    {

        Route::get('/', [EmployerController::class, 'index'])->name('employer.index'); 
        Route::get('/create', [EmployerController::class, 'create'])->name('employer.create'); 
        Route::get('/edit/{employer}', [EmployerController::class, 'edit'])->name('employer.edit'); 
    });

});

    Route::get('dashboard', [AppController::class, 'index'])->name('dashboard');

