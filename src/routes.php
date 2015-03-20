<?php

/*
|--------------------------------------------------------------------------
| Package Routes
|--------------------------------------------------------------------------
|
*/

Route::group(array('prefix' => Config::get('notifications::config.route_prefix')), function() {

	Route::get('/mark_as_read/{id}', 'Illizian\Notifications\Controllers\NotificationController@mark_as_read');

});