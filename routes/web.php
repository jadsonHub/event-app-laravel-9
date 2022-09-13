<?php

use App\Http\Controllers\Client\ClientController;
use App\Http\Controllers\Login\LoginController;
use App\Http\Controllers\Reset\ResetEmailController;
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

Route::controller(LoginController::class)->group(function () {

    Route::middleware(['guest'])->group(function () {
        Route::get('login', 'login')->name('login');
        Route::post('login', 'store')->name('login.store');
    });

    Route::middleware(['auth'])->group(function () {
        Route::post('logout', 'logout')->name('logout');
    });
});

Route::controller(ResetEmailController::class)->group(function () {

    Route::middleware(['guest'])->group(function () {
        Route::get('reset-password', 'reset_password')->name('frm.reset');
        Route::post('verfiy-email', 'verify_email')->name('verify.email');
        Route::post("reset/valid/expired=true",'rest_password_valid')->name('reset.password');
        Route::get('reset/{hashe}/{email}','verificed_email');
    });
});

Route::controller(ClientController::class)->group(function () {

    Route::middleware(['guest'])->prefix('client')->group(function () {
        Route::get('create', 'createFmr')->name('client.create');
        Route::post('store', 'store')->name('client.store');
    });

    Route::middleware(['auth'])->prefix('client')->group(function () {
        Route::get('index', 'index')->name('client.index');
        Route::put('update', 'update')->name('client.update');
        Route::get('edit/{id}', 'edit')->name('client.edit');
        Route::get('show', 'show')->name('client.show');
        Route::get('delete/{id}', 'delete')->name('client.delete');
        Route::delete('destroy', 'destroy')->name('client.destroy');
    });
});
