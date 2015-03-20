<?php namespace Illizian\Notifications\Traits;

trait NotificationableTrait
{
	
	/**
	 * Notifications Relationship
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function notifications()
	{
		return $this->hasMany('Illizian\Notifications\Models\Notifications', 'to_user_id')->with('from')->orderBy('created_at', 'desc');;
	}

	/**
	 * Unread Notifications Relationship
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function unreadNotifications()
	{
		return $this->hasMany('Illizian\Notifications\Models\Notifications', 'to_user_id')->with('from')->unread()->orderBy('created_at', 'desc');;
	}

}