<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Authenticate\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\OperatorController;
use App\Http\Controllers\TechnicianController;
use App\Http\Controllers\Authenticate\RegisterController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\CheckUserRole;

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
})->name('home');

// Login - Register routes GUEST
Route::middleware(['guest:web'])->group(function () {
    Route::get('/login', [LoginController::class, 'show'])->name('login.show');
    Route::post('/login', [LoginController::class, 'store'])->name('login.store');

    Route::get('/register', [RegisterController::class, 'show'])->name('register.show');
    Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
});


Route::middleware(['auth:web'])->group(function () {

    // Logout
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    // Custom middleware check role type = admin
    Route::middleware(['checkRoles:admin'])->group(function () {


        Route::get('users',[UserController::class,'index'])->name('users.index');
        Route::get('users/create',[UserController::class,'create'])->name('users.create');
        Route::post('users',[UserController::class,'store'])->name('users.store');
        Route::get('users/{user}/edit',[UserController::class,'edit'])->name('users.edit');
        Route::put('users/{user}',[UserController::class,'update'])->name('users.update');
        Route::get('users/{user}',[UserController::class,'show'])->name('users.show');
        Route::delete('users/{user}',[UserController::class,'destroy'])->name('users.destroy');
    



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



    
});
