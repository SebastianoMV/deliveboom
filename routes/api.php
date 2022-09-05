<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::namespace('Api')
    ->prefix('foods')
    ->group(function () {
        Route::get('/', 'PageController@index');
        Route::get('/user-typology/{id}', 'PageController@getUserByTypology');

        Route::get('/menu/{slug}', 'PageController@getUserBySlug');
        Route::get('/food-category/{id}', 'PageController@getFoodByUserWithCategory');

        Route::get('/food-category-filtered/{id}', 'PageController@getFoodByCategory');
    });

Route::post('/orders', 'Api\PageController@store');