<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AppController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ConfigurationController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\DepartementController;
use App\Http\Controllers\PaymentController;
use App\Models\Configuration;
use Illuminate\Support\Facades\Route;



Route::get(uri: '/', action: [AuthController::class, 'login'])->name(name: 'login');
Route::post(uri: '/login', action: [AuthController::class, 'HandleLogin'])->name(name: 'HandleLogin');






/*ROUTE <SECURISE*/

Route::middleware('auth')->group(function ()
{
    Route::get('dashboard', [AppController::class, 'index'])->name('dashboard');

//SECURISER LE CONTROLEUR EMPLOYER ET LE CONTROLEUR DEPARTEMENT

    Route::prefix('employers')->group(function()
    {
        //SECURISER LE CONTROLEUR EMPLOYER
         
        Route::get('/', [EmployerController::class, 'index'])->name('employer.index'); 
        Route::get('/create', [EmployerController::class, 'create'])->name('employer.create'); 
        Route::post('/store', [EmployerController::class, 'store'])->name('employer.store');
        Route::put('/employers/update/{employer}',[EmployerController::class, 'update'])->name('employer.update');
        Route::get('/edit/{employer}', [EmployerController::class, 'edit'])->name('employer.edit'); 
        Route::get('/departements/{employer}',[DepartementController::class, 'delete'])->name('employer.delete');

    });

    //SECURISER LE CONTROLEUR DEPARTEMENT
     Route::prefix('departements')->group(function()
    {

        Route::get('/', [DepartementController::class, 'index'])->name('departement.index'); 
        Route::get('/create', [DepartementController::class, 'create'])->name('departement.create'); 
        Route::post('/store', [DepartementController::class, 'store'])->name('departement.store'); 
        Route::get('/edit/{departement}', [DepartementController::class, 'edit'])->name('departement.edit'); 
        Route::put('/update/{departement}',[DepartementController::class, 'update'])->name('departement.update'); 
        Route::get('/{departement}',[DepartementController::class, 'delete'])->name('departement.delete');
       

    });

    //CONFIGURATION
        Route::prefix('configuration')->group(function(){
        Route::get('/', [ConfigurationController::class, 'index'])->name('configurations');
        Route::get('/create', [ConfigurationController::class, 'create'])->name('configurations.create');
        Route::post('/store', [ConfigurationController::class, 'store'])->name('configurations.store');
        Route::get('/delete/{configuration}', [ConfigurationController::class, 'delete'])->name('configurations.delete');

    });

    //ADMINISTRATEUR
    Route::prefix('administrateurs')->group(function()
    {
        Route::get('/', [AdminController::class, 'index'])->name('administrateurs');
        Route::get('/create', [AdminController::class, 'create'])->name('administrateurs.create'); 
        Route::post('/create', [AdminController::class, 'store'])->name('administrateurs.store');
        Route::get('/delete/{user}',[AdminController::class, 'delete'])->name('administrateurs.delete');
        Route::get('/edit/{administrateur}', [AdminController::class, 'edit'])->name('administrateurs.edit'); 
        Route::put('/update/{administrateur}',[AdminController::class, 'update'])->name('administrateurs.update');

    });

    //PAIEMENTS
    Route::prefix('paiements')->group(function(){
        Route::get('/',[PaymentController::class, 'index'])->name('payments');
        Route::get('/make', [PaymentController::class, 'initPayment'])->name('payment.init');
        Route::get('/download-invoice/{payment}', [PaymentController::class, 'download_invoice'])->name('payment.download');
    });

       

    
    //Validation de compte
    Route::get('/validate-account/{email}', [AdminController::class, 'defineAccess']);

    //Validation de compte
    Route::post('/validate-account/{email}', [AdminController::class, 'submitDefineAccess']) ->name('submitDefineAccess');
   



});


//TEST AVANT LA CREATION DE L'ADMIN POUR SE CONNECTER

//EMPLOYER
    // Route::get('/employers/create', [EmployerController::class, 'create'])->name('employer.create'); 

    //  Route::post('/employers/store', [EmployerController::class, 'store'])->name('employer.store');

    // Route::get('/employers', [EmployerController::class, 'index'])->name('employer.index'); 

    // Route::get('/employers/edit/{employer}', [EmployerController::class, 'edit'])->name('employer.edit'); 

    // Route::put('/employers/update/{employer}',[EmployerController::class, 'update'])->name('employer.update');

    //Route::get('/employers/{employer}',[EmployerController::class, 'delete'])->name('employer.delete');

    //DEPARTEMENT
    // Route::get('/departements', [DepartementController::class, 'index'])->name('departement.index');
    // Route::get('/departements/create', [DepartementController::class, 'create'])->name('departement.create');

    //  Route::post('/departement/create', [DepartementController::class, 'store'])->name('departement.store'); 

    //  Route::get('/departements/edit/{departement}', [DepartementController::class, 'edit'])->name('departement.edit'); 

    //  Route::put('/departements/update/{departement}',[DepartementController::class, 'update'])->name('departement.update');

    //  Route::get('/departements', [DepartementController::class, 'index'])->name('departement.index'); 

    //  Route::get('/departements/{departement}',[DepartementController::class, 'delete'])->name('departement.delete');


    //DASHBOARD
    //Route::get('dashboard', [AppController::class, 'index'])->name('dashboard');


    //CONFIGURATION
    //  Route::get('configurations', [ConfigurationController::class, 'index'])->name('configurations');

    //  Route::get('configurations/create', [ConfigurationController::class, 'create'])->name('configurations.create');

    // Route::post('configurations/store', [ConfigurationController::class, 'store'])->name('configurations.store');

    // Route::get('configurations/delete/{configuration}', [ConfigurationController::class, 'delete'])->name('configurations.delete');

    // //ADMINISTRATEUR
    // Route::get('/administrateurs', [AdminController::class, 'index'])->name('administrateurs');

    //Route::get('/administrateurs/create', [AdminController::class, 'create'])->name('administrateurs.create'); 

    //Route ::post('/administrateurs/create', [AdminController::class, 'store'])->name('administrateurs.store');

    // Route::get('/administrateurs/edit/{administrateur}', [AdminController::class, 'edit'])->name('administrateurs.edit'); 

    // Route::put('/administrateurs/update/{administrateur}',[AdminController::class, 'update'])->name
    // ('administrateurs.update');

    // Route::get('/administrateurs/delete/{administrateur}',[AdminController::class, 'delete'])->name('administrateurs.delete');






