<?php

namespace App\Listeners;

use App\Client;
use App\Events\EventCompleted;


class UpdateLastComment
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
        Client::find($event->event->client_id)->update(['last_comment' => $event->event->comment]);
    }
}
