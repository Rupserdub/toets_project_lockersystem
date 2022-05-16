<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\LockerController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('lockers', [LockerController::class, 'index'])->name('lockers.index');

Route::get('lockers/create', [LockerController::class, 'create'])->name('lockers.create');

Route::post('lockers/create', [LockerController::class, 'store'])->name('lockers.store');

Route::put('lockers/{id}', [LockerController::class, 'linkStudentToLocker'])->name('lockers.update');

Route::put('lockers/delete/{id}', [LockerController::class, 'releaseLocker'])->name('lockers.release');