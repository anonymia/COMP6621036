<?php

use App\Http\Controllers\PartController;
use App\Http\Controllers\SimulasiController;
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

Route::redirect('/', '/simulasi')->middleware(['auth']);

Route::get('/simulasi', [SimulasiController::class, 'index'])->middleware(['auth'])->name('simulasi');
Route::post('/simulasi', [SimulasiController::class, 'submit'])->middleware(['auth']);

Route::get('/admin', [PartController::class, 'index'])->middleware(['auth', 'can:admin'])->name('admin');
Route::post('/admin', [PartController::class, 'update'])->middleware(['auth', 'can:admin']);

require __DIR__.'/auth.php';
