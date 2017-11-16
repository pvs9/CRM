<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
	use SoftDeletes;

	/**
	 * The attributes that aren't mass assignable.
	 *
	 * @var array
	 */
	protected $guarded = ['is_admin', 'remember_token',];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
		'password', 'remember_token',
	];

	/**
	 * The attributes that should be mutated to dates.
	 *
	 * @var array
	 */
	protected $dates = ['deleted_at'];

	/**
	 * Get the clients for the manager.
	 */
	public function clients()
	{
		return $this->hasMany('App\Client');
	}

	/**
	 * Get the statistics for the manager.
	 */
	public function statistics()
	{
		return $this->hasMany('App\Statistic');
	}

	/**
	 * Get all of the events for the manager.
	 */
	public function events()
	{
		return $this->hasManyThrough('App\Event', 'App\Client');
	}
}
