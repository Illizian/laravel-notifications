<?php namespace Illizian\Notifications\Controllers;

use Illizian\Notifications\Notify;

class NotificationController extends \BaseController
{

	public function mark_as_read($id)
	{
		return Notify::read($id);
	}

}