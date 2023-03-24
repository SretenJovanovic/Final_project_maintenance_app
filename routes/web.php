<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OperatorController;
use App\Http\Controllers\EquipementController;
use App\Http\Controllers\TechnicianController;
use App\Http\Controllers\Authenticate\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home.index');

// Login routes GUEST
Route::middleware(['guest:web'])->group(function () {
    Route::get('/login', [LoginController::class, 'show'])->name('login.show');
    Route::post('/login', [LoginController::class, 'store'])->name('login.store');
});


Route::middleware(['auth:web'])->group(function () {
    // Logout
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    // Custom middleware check role type = admin
    Route::middleware(['checkRoles:admin'])->group(function () {

        Route::get('users', [UserController::class, 'index'])->name('users.index');
        Route::get('users/create', [UserController::class, 'create'])->name('users.create');
        Route::post('users', [UserController::class, 'store'])->name('users.store');
        Route::get('users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
        Route::put('users/{user}', [UserController::class, 'update'])->name('users.update');
        Route::get('users/{user}', [UserController::class, 'show'])->name('users.show');
        Route::delete('users/{user}', [UserController::class, 'destroy'])->name('users.destroy');


        Route::get('equipements', [EquipementController::class, 'index'])->name('equipements.index');
        Route::get('equipements/create', [EquipementController::class, 'create'])->name('equipements.create');
        Route::post('equipements', [EquipementController::class, 'store'])->name('equipements.store');
        Route::get('equipements/{equipement}/edit', [EquipementController::class, 'edit'])->name('equipements.edit');
        Route::put('equipements/{equipement}', [EquipementController::class, 'update'])->name('equipements.update');
        Route::get('equipements/{equipement}', [EquipementController::class, 'show'])->name('equipements.show');
        Route::delete('equipements/{equipement}', [EquipementController::class, 'destroy'])->name('equipements.destroy');

        Route::get('/admin/', [AdminController::class, 'index'])->name('admin.index');
    });


    // Custom middleware check role type = technician
    Route::middleware(['checkRoles:technician'])->group(function () {
        Route::get('/technician', [TechnicianController::class, 'index'])->name('technician.index');
    });


    // Custom middleware check role type = operator
    Route::middleware(['checkRoles:operator'])->group(function () {
        Route::get('/operator/', [OperatorController::class, 'index'])->name('operator.index');
    });

    // Custom middleware check role type = employee 
    // Only access to ticket report ( Object ticket) and ticked status
    // TODO
    Route::middleware(['checkRoles:employee'])->group(function () {
        Route::get('/employee/', [OperatorController::class, 'index'])->name('employee.index');
    });
});
