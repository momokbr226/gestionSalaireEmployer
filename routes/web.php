<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ConfigurationController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\DepartementController;
use App\Models\Configuration;
use Illuminate\Support\Facades\Route;



Route::get(uri: '/', action: [AuthController::class, 'login'])->name(name: 'login');
Route::post(uri: '/login', action: [AuthController::class, 'HandleLogin'])->name(name: 'HandleLogin');


/*ROUTE <SECURISE*/

Route::middleware('auth')->group(function ()
{
    //Route::get('dashboard', [AppController::class, 'index'])->name('dashboard');

//SECURISER LE CONTROLEUR EMPLOYER ET LE CONTROLEUR DEPARTEMENT

    Route::prefix('employers')->group(function()
    {
        //SECURISER LE CONTROLEUR EMPLOYER
         
        //Route::get('/', [EmployerController::class, 'index'])->name('employer.index'); 
        //Route::get('/create', [EmployerController::class, 'create'])->name('employer.create'); 
        //Route::post('/store', [EmployerController::class, 'store'])->name('employer.store');
        //Route::put('/employers/update/{employer}',[EmployerController::class, 'update'])->name('employer.update');
        //Route::get('/edit/{employer}', [EmployerController::class, 'edit'])->name('employer.edit'); 
        //Route::get('/departements/{departement}',[DepartementController::class, 'delete'])->name('departement.delete');

    });

    //SECURISER LE CONTROLEUR DEPARTEMENT
     Route::prefix('departements')->group(function()
    {

        //Route::get('/', [DepartementController::class, 'index'])->name('departement.index'); 
        //Route::get('/create', [DepartementController::class, 'create'])->name('departement.create'); 
        //Route::post('/store', [DepartementController::class, 'store'])->name('departement.store'); 
        //Route::get('/edit/{departement}', [DepartementController::class, 'edit'])->name('departement.edit'); 
        //Route::put('/update/{departement}',[DepartementController::class, 'update'])->name('departement.update'); 
        //Route::get('/{departement}',[DepartementController::class, 'delete'])->name('departement.delete');
       

    });

    //CONFIGURATION
        Route::prefix('configuration')->group(function(){
        //Route::get('/', [ConfigurationController::class, 'index'])->name('configurations');
        //Route::get('/create', [ConfigurationController::class, 'create'])->name('configurations.create');
        //Route::post('/store', [ConfigurationController::class, 'store'])->name('configurations.store');
        //Route::get('/delete/{configuration}', [ConfigurationController::class, 'delete'])->name('configurations.delete');

    });

});


//TEST AVANT LA CREATION DE L'ADMIN POUR SE CONNECTER

//EMPLOYER
    Route::get('/employers/create', [EmployerController::class, 'create'])->name('employer.create'); 

     Route::post('/employers/store', [EmployerController::class, 'store'])->name('employer.store');

    Route::get('/employers', [EmployerController::class, 'index'])->name('employer.index'); 

    Route::get('/employers/edit/{employer}', [EmployerController::class, 'edit'])->name('employer.edit'); 

    Route::put('/employers/update/{employer}',[EmployerController::class, 'update'])->name('employer.update');

    Route::get('/employers/{employer}',[EmployerController::class, 'delete'])->name('employer.delete');

    //DEPARTEMENT
    Route::get('/departements', [DepartementController::class, 'index'])->name('departement.index');
    Route::get('/departements/create', [DepartementController::class, 'create'])->name('departement.create');

     Route::post('/departement/create', [DepartementController::class, 'store'])->name('departement.store'); 

     Route::get('/departements/edit/{departement}', [DepartementController::class, 'edit'])->name('departement.edit'); 

     Route::put('/departements/update/{departement}',[DepartementController::class, 'update'])->name('departement.update');

     Route::get('/departements', [DepartementController::class, 'index'])->name('departement.index'); 

     Route::get('/departements/{departement}',[DepartementController::class, 'delete'])->name('departement.delete');


    //DASHBOARD
    Route::get('dashboard', [AppController::class, 'index'])->name('dashboard');


    //CONFIGURATION
     Route::get('configurations', [ConfigurationController::class, 'index'])->name('configurations');

     Route::get('configurations/create', [ConfigurationController::class, 'create'])->name('configurations.create');

    Route::post('configurations/store', [ConfigurationController::class, 'store'])->name('configurations.store');

    Route::get('configurations/delete/{configuration}', [ConfigurationController::class, 'delete'])->name('configurations.delete');



