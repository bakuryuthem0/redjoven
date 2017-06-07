<?php

class Assignment extends Eloquent{
	public function users()
	{
		return $this->belongsTo('User','user_id')->with('roles');
	}
}
