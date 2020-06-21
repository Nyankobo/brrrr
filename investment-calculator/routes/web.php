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

/**
 * Save property details
 */
Route::post('/save', 'CalculateController@index')->name('save-form');

/**
 * Display Results
 */
Route::get('/results/{id}', 'CalculateController@results')->name('results');

