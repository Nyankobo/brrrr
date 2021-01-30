<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;
use App\Http\Controllers\CalculateController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/', function () {
    return view('auth.login');
})->middleware(['guest'])->name('dashboard');

Route::prefix('calculator')->middleware('auth')->group(function () {
    Route::get('/', [FormController::class, 'index'])->name('home');
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
});

require __DIR__.'/auth.php';
