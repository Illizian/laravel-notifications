<?php namespace Illizian\Notifications;

class Notify
{

	/**
	 * Emit event with notification content
	 *
	 * @param Illuminate\Database\Eloquent\Model  $notification  the notification
	 * @return null
	 */
	private function emitEvent($type, $notification)
	{
		$namespace = Config::get('notifications::config.package_prefix') . '.' . $type;
		Event::fire($namespace, array($notification));
	}

	/**
	 * Notify a user.
	 *
	 * @param Illuminate\Database\Eloquent\Model  $to       the User the notification should be sent to.
	 * @param Illuminate\Database\Eloquent\Model  $from     the User the notification was sent from.
	 * @param string                              $message  the notification message.
	 * @param string                              $url      the relative url related to the message
	 * @return boolean  result of the save call
	 */
	public static function send($to, $from, $message, $url)
	{
		// Create a new instance of the Notifications model
		$notification = new Models\Notifications();

		// Set associated values
		$notification->from()->associate($from);
		$notification->to()->associate($to);
		$notification->message = $message;
		$notification->url = $url;

		// Trigger event listeners
		$this->emitEvent('send', $notification);

		// Save the new notification
		return $notification->save();
	}

	/**
	 * Mark a notification as read.
	 *
	 * @param int  $id  the id of the notification.
	 * @return boolean  result of the save call
	 */
	public static function read($id)
	{
		// Fetch the notification from the database
		$notification = Models\Notifications::find($id);

		// Update the read status
		$notification->read = true;
		$notification->save();

		// Trigger event listeners
		$this->emitEvent('read', $notification);

		// Save the updated notification
		return $notification;
	}
	
}