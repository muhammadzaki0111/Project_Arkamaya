<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('login-proses', [LoginController::class, 'authenticate']);
Route::middleware(['auth'])->group(function () {
Route::get('/',[DashboardController::class,'index']);
Route::resource('/project', ProjectController::class);
Route::resource('/client', ClientController::class);
Route::post('/proses-form', [ClientController::class, 'deleteSelected'])->name('proses.form');
Route::post('/proses-form', [ProjectController::class, 'deleteSelected'])->name('projects.deleteSelected');
Route::resource('/user', UserController::class);
});
