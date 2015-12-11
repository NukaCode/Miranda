<?php

Route::group(['middleware' => 'auth'], function () {
    require_once('users.php');
    require_once('projects.php');
    require_once('issues.php');

    // Logs
    Route::get('logs', [
        'as'   => 'logs',
        'uses' => '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index',
    ]);

    Route::get('logout', [
        'as'   => 'auth.logout',
        'uses' => 'AuthController@logout',
    ]);
});
