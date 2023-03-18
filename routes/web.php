<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\OperatorController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TechnicianController;

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

Route::get('/login', [LoginController::class, 'show'])->name('login.show');
Route::post('/login', [LoginController::class, 'store'])->name('login.store');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/register', [RegisterController::class, 'show'])->name('register.show');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

Route::middleware(['auth:web'])->group(function () {

    Route::middleware(['checkRoles:admin'])->group(function () {
        Route::get('/admin/index', [AdminController::class, 'index'])->name('admin.index');
    });
    Route::get('/technician/index', [TechnicianController::class, 'index'])->name('technician.index');
    Route::get('/operator/index', [OperatorController::class, 'index'])->name('operator.index');
    Route::get('/', [ProfileController::class, 'index'])->name('profiles.index');
});
