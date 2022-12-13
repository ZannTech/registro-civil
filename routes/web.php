<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [DashboardController::class, 'index'])->middleware(['auth', 'verified']);

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/matrimonio', [DashboardController::class, 'matrimonio'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/defunciones', [DashboardController::class, 'defuncion'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/nacimiento', [DashboardController::class, 'nacimiento'])->middleware(['auth', 'verified'])->name('dashboard');
Route::post('/crud', [DashboardController::class, 'genCrud'])->middleware(['auth', 'verified'])->name('dashboard');
Route::post('/deleteRow', [DashboardController::class, 'deleteRow'])->middleware(['auth', 'verified'])->name('dashboard');
Route::post('/showDetail', [DashboardController::class, 'getField']);
Route::get('/error', function () {
    abort(500);
});

require __DIR__.'/auth.php';
