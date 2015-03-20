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
		return $this->hasMany('Illizian\Notifications\Models\Notifications', 'to_user_id')->orderBy('created_at', 'desc');;
	}

}