<?php

Route::resource('project', 'ProjectController');

Route::group(['prefix' => 'project'], function () {
    Route::get('issues/{project}', [
        'as' => 'project.issues',
        'uses' => 'IssueController@byProject'
    ]);
});
