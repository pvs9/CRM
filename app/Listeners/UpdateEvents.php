<?php

namespace App\Listeners;

use App\Statistic;
use Illuminate\Support\Facades\Auth;
use App\Events\EventCreated;


class UpdateEvents
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
	 * @param  EventCreated  $event
	 * @return void
	 */
	public function handle(EventCreated $event)
	{
		$statistic = Statistic::firstOrCreate(
			['user_id' => Auth::id(), 'month' => date("F"), 'year' => date("Y")], ['events' => 0, 'events_closed' => 0]
		);

		$statistic->events++;
		$statistic->save();
	}
}
