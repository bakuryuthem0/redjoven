<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;
	public function assignments()
	{
		return $this->hasMany('Assignment','user_id');
	}
	public function roles()
	{
		return $this->belongsTo('Role','role');
	}
}
