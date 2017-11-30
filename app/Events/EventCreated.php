<?php

namespace App\Events;

use App\Event;
use Illuminate\Queue\SerializesModels;

class EventCreated
{
	use SerializesModels;

	public $event;


	/**
	 * Create a new event instance.
	 *
	 * @param Event $event
	 * @return void
	 */
	public function __construct(Event $event)
	{
		$this->event = $event;
	}

}
