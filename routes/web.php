<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HelperController;
use App\Http\Controllers\PatientController;
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

Route::controller(HelperController::class)->group( function () {
    Route::get('/Helper/webApi/{cep}/','viaCepApi')->name('search.addressByCEP');
});

Route::controller(AddressController::class)->group( function () {
    Route::get('/Address/patient/{id}/','index')->name('search.address');
    Route::post('/Address/post/','store')->name('store.address');
});

Route::controller(PatientController::class)->group( function () {
    Route::get('/Patient/patient/{id}/','index')->name('search.patient');
    Route::post('/Patient/post','store')->name('store.patient');
});

Route::get('/patient/{id}', 'PatientController@index')->name('patient.get');
