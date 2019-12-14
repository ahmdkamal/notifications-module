<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['web', 'auth'], 'as' => 'kamal.', 'prefix' => '/users',
    'namespace' => 'Kamal\NotificationsModule\Http\Controllers'], function () {

    Route::group(['as' => 'devices.', 'prefix' => 'devices',], function () {
        Route::post('add-update', 'DevicesController@addOrUpdate')
            ->name('add-update');
    });

});