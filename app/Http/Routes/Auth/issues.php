<?php

Route::resource('issue', 'IssueController');

Route::group(['prefix' => 'issue'], function () {
    Route::put('{issue}/comment', [
        'as'   => 'issue.comment',
        'uses' => 'IssueController@comment',
    ]);
});
