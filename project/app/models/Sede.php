<?php

class Sede extends Eloquent{
	public function user()
	{
		return $this->belongsTo('User','user_id');
	}
	public function assingments()
	{
		return $this->hasMany('Assignment','sede_id');
	}
	public function assignmentCount()
	{
	  return $this->assingments()
	    ->selectRaw('sede_id,count(*) as aggregate')
	    ->groupBy('sede_id');
	}
	public function imagenes()
	{
		return $this->hasMany('Gallery','sede_id');
		
	}
	public function imgTiles()
	{
		return $this->hasMany('Gallery','sede_id')->orderBy('id','DESC');
	}
	public function imagenesCount()
	{
	  return $this->imagenes()
	    ->selectRaw('sede_id,count(*) as aggregate')
	    ->groupBy('sede_id');
	}
}
