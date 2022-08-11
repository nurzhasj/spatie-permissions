<?php

use App\Http\Controllers\ClientsController;
use App\Http\Controllers\CompaniesController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [CompaniesController::class, 'index'])->name('dashboard');
    Route::get('add-company', [CompaniesController::class, 'create'])->name('add-company');
    Route::post('store-company', [CompaniesController::class, 'store'])->name('store-company');
    Route::get('edit-company/{id}', [CompaniesController::class, 'edit'])->name('edit-company');
    Route::put('update-company/{id}', [CompaniesController::class, 'update'])->name('update-company');
    Route::delete('delete-company/{id}', [CompaniesController::class, 'delete'])->name('delete-company');

    Route::get('add-client/{id}', [ClientsController::class, 'create'])->name('add-client');
    Route::post('store-client', [ClientsController::class, 'store'])->name('store-client');

    Route::get('/company', [ClientsController::class, 'index'])->name('company');
    Route::view('company-balance', 'companies/company-balance')->name('company-balance');
    Route::view('/client', 'client')->name('client');

});


require __DIR__.'/auth.php';
