<?php

Route::group(['middleware' => 'guest'], function () {
    Route::get('login', [
        'as'   => 'auth.login',
        'uses' => 'AuthController@login',
    ]);
    Route::post('login', [
        'as'   => 'auth.login',
        'uses' => 'AuthController@handleLogin',
    ]);
    Route::get('register', [
        'as'   => 'auth.register',
        'uses' => 'AuthController@register',
    ]);
    Route::post('register', [
        'as'   => 'auth.register',
        'uses' => 'AuthController@handleRegister',
    ]);
});
