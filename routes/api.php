<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Authenticate\AuthController;
use App\Http\Controllers\Api\Authenticate\UserController;
use App\Http\Controllers\Api\Authenticate\RolesController;
use App\Http\Controllers\Api\Authenticate\SectionsController;
use App\Http\Controllers\Api\Authenticate\EquipementController;
use App\Http\Controllers\Api\Authenticate\OpenTicketController;
use App\Http\Controllers\Api\Authenticate\TicketCategoryController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/login', [AuthController::class, 'login']);
/*
|----------------------------------------
| Logged users only
|----------------------------------------
*/
Route::group(['middleware' => ['auth:sanctum']], function () {

    Route::get('users', [UserController::class, 'index']);
    Route::post('users', [UserController::class, 'store']);
    Route::get('users/{user}/edit', [UserController::class, 'edit']);
    Route::put('users/{user}', [UserController::class, 'update']);
    Route::get('users/{user}', [UserController::class, 'show']);
    Route::delete('users/{user}', [UserController::class, 'destroy']);

    Route::get('equipements', [EquipementController::class, 'index']);
    Route::post('equipements', [EquipementController::class, 'store']);
    Route::get('equipements/{equipement}/edit', [EquipementController::class, 'edit']);
    Route::put('equipements/{equipement}', [EquipementController::class, 'update']);
    Route::get('equipements/{equipement}', [EquipementController::class, 'show']);
    Route::delete('equipements/{equipement}', [EquipementController::class, 'destroy']);

    Route::resource('roles', RolesController::class);

    Route::resource('sections', SectionsController::class);
    Route::resource('tickets/category', TicketCategoryController::class);


    Route::get('tickets/openTickets', [OpenTicketController::class, 'index']);
    Route::post('tickets/openTickets', [OpenTicketController::class, 'store']);
    Route::get('tickets/openTickets/{openTicket}', [OpenTicketController::class, 'show']);
    Route::post('tickets/openTickets/assign', [OpenTicketController::class, 'assign']);
    Route::post('tickets/openTickets/close/{assignedTicket}', [OpenTicketController::class, 'close']);


    Route::post('/logout', [AuthController::class, 'logout']);
});
