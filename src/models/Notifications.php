<?php namespace Illizian\Notifications\Models;

use Illuminate\Support\Facades\Config;
use Illuminate\Database\Eloquent\Model as Eloquent;

class Notifications extends Eloquent
{

	protected $table;

	public function __construct()
	{
		$this->table = Config::get('notifications::config.table_name');
	}

	/**
	 * From User Relationship
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function from()
	{
		return $this->belongsTo(Config::get('notifications::config.user_model'), 'from_user_id');
	}

	/**
	 * To User Relationship
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function to()
	{
		return $this->belongsTo(Config::get('notifications::config.user_model'), 'to_user_id');
	}

	/**
	 * Scope for a notification to $userId for $url that is not read, 
	 *
	 * @return \Illuminate\Database\Query\Builder
	 */
	public function scopeForIdAndUrl($query, $userId, $url)
	{
		return $query->where('to_user_id', '=', $userId)
					 ->where('url', '=', $url)
					 ->where('read', '=', false);
	}

}
