<?php

namespace App\Listeners;

use App\Statistic;
use Illuminate\Support\Facades\Auth;
use App\Events\EventCompleted;


class UpdateEventsClosed
{
	/**
	 * Create the event listener.
	 *
	 * @return void
	 */
	public function __construct()
	{
		//
	}

	/**
	 * Handle the event.
	 *
	 * @param  EventCompleted  $event
	 * @return void
	 */
	public function handle(EventCompleted $event)
	{
		$statistic = Statistic::firstOrCreate(
			['user_id' => Auth::id(), 'month' => date("F"), 'year' => date("Y")], ['events' => 0, 'events_closed' => 0]
		);

		$statistic->events_closed++;
		$statistic->save();
	}
}
