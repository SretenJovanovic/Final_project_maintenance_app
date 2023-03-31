<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\CalendarController;
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



/*
|----------------------------------------
| Login routes GUEST
|----------------------------------------
*/

Route::middleware(['guest:web'])->group(function () {
    Route::get('/login', [LoginController::class, 'show'])->name('login.show');
    Route::post('/login', [LoginController::class, 'store'])->name('login.store');


    /*
|----------------------------------------
| Route for downloading my project documentation
|----------------------------------------
*/
    Route::get('documentation', function () {
        $path = storage_path('app/public/projectDocumentation/Dokumentacija.pdf');
        return response()->download($path);
    })->name('project.documentation');
});


/*
|----------------------------------------
| Logged users only
|----------------------------------------
*/
Route::middleware(['auth:web'])->group(function () {

    Route::get('/', function () {
        return view('index');
    })->name('homepage');

    /*
|----------------------------------------
| Logout Route
|----------------------------------------
*/
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


    /*
|----------------------------------------
| All tickets + particular user tickets
|----------------------------------------
*/
    Route::get('/tickets/all', [TicketController::class, 'index'])->name('ticket.index');
    Route::get('/tickets/{user:username}', [TicketController::class, 'myTickets'])->name('ticket.my.show');

    /*
|----------------------------------------
| Closed tickets
|----------------------------------------
*/
    Route::prefix('closed')->group(function () {
        Route::get('/tickets', [ClosedTicketController::class, 'index'])->name('closed.ticket.index');
    });

    /*
|----------------------------------------
| Open tickets CRUD
|----------------------------------------
*/
    Route::prefix('open')->group(function () {
        Route::get('/tickets', [OpenTicketController::class, 'index'])->name('open.ticket.index');
        Route::get('/tickets/create', [OpenTicketController::class, 'create'])->name('open.ticket.create');
        Route::post('/tickets', [OpenTicketController::class, 'store'])->name('open.ticket.store');
        Route::post('/tickets/assign', [OpenTicketController::class, 'assign'])->name('open.ticket.assign');
    });

    /*
|----------------------------------------
| Assigned tickets
|----------------------------------------
*/
    Route::prefix('assigned')->group(function () {
        Route::get('/tickets', [AssignedTicketController::class, 'index'])->name('assigned.ticket.index');
        Route::post('/tickets/{assignedTicket}', [AssignedTicketController::class, 'close'])->name('assigned.ticket.close');
    });


    /*
|----------------------------------------
| Custom middleware for admin/manager
| Routes for user and equipement CRUD
|----------------------------------------
*/
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

        /*
|----------------------------------------
| Only admin routes
|----------------------------------------
*/
        Route::middleware(['checkRoles:admin'])->group(function () {
            Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
            Route::post('/tickets/category', [TicketController::class, 'storeCategory'])->name('ticketCategory.store');
            Route::delete('/tickets/category/{ticketCategory}', [TicketController::class, 'destroyCategory'])->name('ticketCategory.destroy');
        });

        /*
|----------------------------------------
|   Only manager routes
|----------------------------------------
*/
        Route::middleware(['checkRoles:manager'])->group(function () {
            Route::get('/manager', [ManagerController::class, 'index'])->name('manager.index');
            Route::post('/manager/meeting', [CalendarController::class, 'set_meeting'])->name('manager.set.meeting');
        });
    });


    /*
|----------------------------------------
|   Only technician routes
|----------------------------------------
*/
    Route::middleware(['checkRoles:technician'])->group(function () {
        Route::get('/technician', [TechnicianController::class, 'index'])->name('technician.index');
        Route::get('/technician/meetings', [CalendarController::class, 'meetings'])->name('technician.meeting');
    });


    /*
|----------------------------------------
|   Only operator routes
|----------------------------------------
*/
    Route::middleware(['checkRoles:operator'])->group(function () {
        Route::get('/operator', [OperatorController::class, 'index'])->name('operator.index');
    });

    /*
|----------------------------------------
|   Only employee routes
|----------------------------------------
*/
    Route::middleware(['checkRoles:employee'])->group(function () {
        Route::get('/employee', function () {
            return view('employee.index');
        })->name('employee.index');
    });
});
