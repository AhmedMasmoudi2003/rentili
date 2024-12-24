<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AppartmentController;
Route::resource('appartments', AppartmentController::class);

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

Route::get('/appartments/index', [AppartmentController::class, 'index']);

Route::post('/appartments/search', [AppartmentController::class, 'search'])->name('appartments.search');
