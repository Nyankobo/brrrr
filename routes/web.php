<?php

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
/**
 * Get property form
 */
Route::get('/', 'FormController@index')->name('home');
Route::get('/{id}', 'FormController@index')->name('edit');

/**
 * Save property details
 */
Route::post('/save', 'CalculateController@index')->name('save-form');
Route::get('/property/getdata/{id}', 'FormController@property')->name('propertyInfo');


/**
 * Display Results
 */
Route::get('/results/{id?}', 'CalculateController@results')->name('results');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

