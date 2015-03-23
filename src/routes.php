<?php

/*
|--------------------------------------------------------------------------
| Package Routes
|--------------------------------------------------------------------------
|
*/

Route::group(array('prefix' => Config::get('notifications::config.route_prefix'), 'before' => Config::get('notifications::config.route_filter')), function() {

	Route::group(array('prefix' => 'api'), function() {
		
		// JSON API
		Route::get('/all',		'Illizian\Notifications\Controllers\NotificationController@getNotificationJson');
		Route::get('/unread',	'Illizian\Notifications\Controllers\NotificationController@getUnreadNotificationJson');

	});

	Route::get('/mark_as_read/{id}', 'Illizian\Notifications\Controllers\NotificationController@mark_as_read');

});