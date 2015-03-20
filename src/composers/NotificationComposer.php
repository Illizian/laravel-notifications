<?php namespace Illizian\Notifications\Composers;

use Illuminate\Support\Facades\Auth;

class NotificationComposer
{

	public function compose($view)
	{
		$view->with('notifications', Auth::user()->notifications);
	}

}