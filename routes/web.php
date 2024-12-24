<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\AppartmentController;
Route::resource('appartments', AppartmentController::class);
Route::resource('clients', ClientsController::class);
Route::post('clients/{client}/add-warning', [ClientsController::class, 'addWarning'])->name('clients.addWarning');
Route::get('/', function () {
    return view('SignIn/signin');
});
