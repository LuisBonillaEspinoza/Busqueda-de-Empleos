<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VacantesController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/vacante',[VacantesController::class,'index'])->middleware(['auth', 'verified'])->name('vacantes.index');
Route::get('/vacante/create',[VacantesController::class,'create'])->middleware(['auth', 'verified'])->name('vacantes.create');
Route::get('/vacante/{vacante:titulo}/edit',[VacantesController::class,'edit'])->middleware(['auth', 'verified'])->name('vacantes.edit');
Route::get('/vacante/{vacante:titulo}/show',[VacantesController::class,'show'])->name('vacantes.show');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
