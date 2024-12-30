<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\AppartmentController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('SignIn.signin');
})->name("Login");
Route::post('/SignIn', [AuthController::class, 'Sign_In'])->name("auth.SignIn");
//middleware
Route::middleware(['auth'])->group(function () {
    Route::resource('appartments', AppartmentController::class);
    Route::resource('clients', ClientsController::class);
    Route::post('clients/{client}/add-warning', [ClientsController::class, 'addWarning'])->name('clients.addWarning');
});
