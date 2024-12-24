<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientsController;
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

Route::resource('clients', ClientsController::class);
Route::post('clients/{client}/add-warning', [ClientsController::class, 'addWarning'])->name('clients.addWarning');
Route::get('/',function(){
    return view("SignIn/signin");
});