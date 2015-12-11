<?php

Route::group(['prefix' => 'user'], function () {
    Route::get('profile', [
        'as'   => 'user.profile',
        'uses' => 'UserController@profile',
    ]);
});
