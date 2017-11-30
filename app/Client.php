<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
	use SoftDeletes;

	/**
	 * The attributes that aren't mass assignable.
	 *
	 * @var array
	 */
	protected $guarded = [];

	/**
	 * The attributes that should be mutated to dates.
	 *
	 * @var array
	 */
	protected $dates = ['created_at', 'updated_at', 'deleted_at'];

	/**
	 * Get the events for the client.
	 */
	public function events()
	{
		return $this->hasMany('App\Event');
	}

	/**
	 * Get the manager that owns the client.
	 */
	public function manager()
	{
		return $this->belongsTo('App\User');
	}
}
