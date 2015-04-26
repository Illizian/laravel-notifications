<?php

use Illuminate\Database\Eloquent\Model;
use Illizian\Notifications\Traits\NotificationableTrait;

class User extends Model {

	use NotificationableTrait;

	protected $table	= 'Users';
	protected $fillable	= ['email'];
	protected $hidden	= array('password');

}
