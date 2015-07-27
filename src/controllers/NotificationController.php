<?php namespace Illizian\Notifications\Controllers;

use Illizian\Notifications\Notify;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Auth;

class NotificationController extends \BaseController
{

	public function getNotificationJson()
	{
		$notifications = Auth::user()->notifications;

		return Response::json($notifications);
	}

	public function getUnreadNotificationJson()
	{
		$notifications = Auth::user()->unreadNotifications;

		return Response::json($notifications);
	}

	public function mark_as_read($id)
	{
		$notification = Notifications::find($id);
		$notification->read = true;
		$notification->save();
		return $notification;
	}

}