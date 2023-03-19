<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Authenticate\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\OperatorController;
use App\Http\Controllers\TechnicianController;
use App\Http\Controllers\Authenticate\RegisterController;

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

Route::get('/', function () {
    return view('welcome');
});
Route::middleware(['guest:web'])->group(function () {
    Route::get('/login', [LoginController::class, 'show'])->name('login.show');
    Route::post('/login', [LoginController::class, 'store'])->name('login.store');

    Route::get('/register', [RegisterController::class, 'show'])->name('register.show');
    Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
});
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth:web'])->group(function () {

    Route::middleware(['checkRoles:admin'])->group(function () {

        Route::get('/admin/', [AdminController::class, 'index'])->name('admin.index');
    });
    Route::middleware(['checkRoles:technician'])->group(function () {
        Route::get('/technician', [TechnicianController::class, 'index'])->name('technician.index');
    });
    Route::middleware(['checkRoles:operator'])->group(function () {
        Route::get('/operator/', [OperatorController::class, 'index'])->name('operator.index');
    });
    Route::get('/', [ProfileController::class, 'index'])->name('profiles.index');
});
