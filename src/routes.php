<?php

/*
|--------------------------------------------------------------------------
| Package Routes
|--------------------------------------------------------------------------
|
*/

Route::group(array('prefix' => 'notifications'), function() {

	Route::get('/mark_as_read/{id}', 'Illizian\Notifications\Controllers\NotificationController@mark_as_read');

});