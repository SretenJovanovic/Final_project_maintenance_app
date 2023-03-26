<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\OperatorController;
use App\Http\Controllers\EquipementController;
use App\Http\Controllers\OpenTicketController;
use App\Http\Controllers\TechnicianController;
use App\Http\Controllers\Authenticate\LoginController;
use App\Http\Controllers\Ticket\ClosedTicketController;
use App\Http\Controllers\Ticket\AssignedTicketController;

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


// Login routes GUEST
Route::middleware(['guest:web'])->group(function () {
    Route::get('/login', [LoginController::class, 'show'])->name('login.show');
    Route::post('/login', [LoginController::class, 'store'])->name('login.store');
});


Route::middleware(['auth:web'])->group(function () {
    // Logout
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


    // ALL TICKETS
    Route::get('/tickets/all', [TicketController::class, 'index'])->name('ticket.index');
    Route::get('/tickets/{user:username}', [TicketController::class, 'myTickets'])->name('ticket.my.show');

    // CLOSED TICKETS
    Route::prefix('closed')->group(function () {
        Route::get('/tickets', [ClosedTicketController::class, 'index'])->name('closed.ticket.index');
    });
    // OPEN TICKETS
    Route::prefix('open')->group(function () {
        Route::get('/tickets', [OpenTicketController::class, 'index'])->name('open.ticket.index');
        Route::get('/tickets/create', [OpenTicketController::class, 'create'])->name('open.ticket.create');
        Route::post('/tickets', [OpenTicketController::class, 'store'])->name('open.ticket.store');
        Route::post('/tickets/assign', [OpenTicketController::class, 'assign'])->name('open.ticket.assign');
    });
    // ASSIGNED TICKETS
    Route::prefix('assigned')->group(function () {
        Route::get('/tickets', [AssignedTicketController::class, 'index'])->name('assigned.ticket.index');
        Route::post('/tickets/{assignedTicket}', [AssignedTicketController::class, 'close'])->name('assigned.ticket.close');
    });
    // Custom middleware check role type = admin
    Route::middleware(['checkRoles:admin|manager'])->group(function () {

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

        Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    });


    // Custom middleware check role type = technician
    Route::middleware(['checkRoles:technician'])->group(function () {
        Route::get('/technician', [TechnicianController::class, 'index'])->name('technician.index');
    });


    // Custom middleware check role type = operator
    Route::middleware(['checkRoles:operator'])->group(function () {
        Route::get('/operator', [OperatorController::class, 'index'])->name('operator.index');
    });

    Route::middleware(['checkRoles:manager'])->group(function () {
        Route::get('/manager', [ManagerController::class, 'index'])->name('manager.index');
    });
    // Custom middleware check role type = employee 
    // Only access to ticket report ( Object ticket) and ticket status
    // TODO
    Route::middleware(['checkRoles:employee'])->group(function () {
        Route::get('/employee', [OperatorController::class, 'index'])->name('employee.index');
    });
});


// If someone tries to go to route that doesnt exist, redirect back
// Route::any('{url}', function(){
//     return back();
// })->where('url', '.*');
