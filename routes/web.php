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

// Route::get('/', function () {
//     return view('guest.welcome');
// })->name('home');

Auth::routes();

Route::middleware('auth')
    ->name('admin.')
    ->namespace('Admin')
    ->prefix('admin')
    ->group(function () {
        Route::get('/', 'HomeController@index')->name('home');
        Route::resource('food', 'FoodController');
        Route::resource('orders', 'OrderController');
        Route::get('chart', 'StatisticsController@index')->name('statistics');
        Route::get('statistic', 'StatisticsController@files');

    });

Route::get('{any?}', function () {
    return view('guest.welcome');
})->where('any', '.*')->name('home');
