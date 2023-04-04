<?php

use App\Http\Controllers\{
    TaskController
};

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

Route::get('/', [TaskController::class, 'index'])->name('tasks.index');
Route::get('/task/{ID}', [TaskController::class, 'show'])->name('tasks.show');
Route::post('/', [TaskController::class, 'store'])->name('tasks.store');
Route::post('/task/{ID}', [TaskController::class, 'update'])->name('tasks.update');
Route::get('/task/status/{ID}', [TaskController::class, 'status'])->name('tasks.status');
Route::get('/task/delete/{ID}', [TaskController::class, 'destroy'])->name('tasks.delete');