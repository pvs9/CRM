<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Statistic extends Model
{
	use SoftDeletes;

	/**
	 * The attributes that aren't mass assignable.
	 *
	 * @var array
	 */
	protected $guarded = [];

	/**
	 * The attributes that should be mutated to dates.x
	 *
	 * @var array
	 */
	protected $dates = ['deleted_at'];


	/**
	 * Get the manager that owns the statistic.
	 */
	public function manager()
	{
		return $this->belongsTo('App\User');
	}
}
