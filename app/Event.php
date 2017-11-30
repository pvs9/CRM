<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Event extends Model
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
	protected $dates = ['date', 'created_at', 'updated_at', 'deleted_at'];

	/**
	 * Get the client that owns the event.
	 */
	public function client()
	{
		return $this->belongsTo('App\Client');
	}

	/**
	 * The storage format of the model's date columns.
	 *
	 * @var string
	 */
	//protected $dateFormat = 'm-d-y H:i:s';
}
