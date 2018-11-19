<?php

Route::group(['middleware' => ['api'], 'namespace' => 'App\Modules\Quotes\Controllers'], function ()
{
    Route::group(['prefix' => 'quotes'], function () {
        Route::get('/', ['uses' => 'QuoteController@index', 'as' => 'quotes.index']);

        Route::get('create', ['uses' => 'QuoteController@create', 'as' => 'quotes.create']);
        Route::post('create', ['uses' => 'QuoteController@store', 'as' => 'quotes.store']);
        Route::get('{id}', ['uses' => 'QuoteController@show', 'as' => 'quotes.show']);
    });
});

