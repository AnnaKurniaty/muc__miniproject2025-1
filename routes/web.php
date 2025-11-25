<?php

use Illuminate\Support\Facades\Route;
use Modules\Employees\Http\Controllers\EmployeesController;
use Modules\Proposal\Http\Controllers\ProposalController;
use Modules\Serviceused\Http\Controllers\ServiceusedController;
use Modules\Timesheet\Http\Controllers\TimesheetController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [EmployeesController::class, 'index']);
Route::get('/proposal', [ProposalController::class, 'index']);
Route::get('/serviceused', [ServiceusedController::class, 'index']);
Route::get('/timesheet', [TimesheetController::class, 'index']);