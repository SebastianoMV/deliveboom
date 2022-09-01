<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::namespace('Api')
    ->prefix('foods')
    ->group(function(){
        Route::get('/', 'PageController@index');
        Route::get('/user-typology/{id}', 'PageController@getFoodByTypology');
    });
