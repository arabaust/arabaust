<?php

namespace Admailer\Events;

use Admailer\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Admailer\Models\SiteSettings;


class ContactAdmin extends Event
{
    use SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public $contactmessage ;
    public function __construct($contactmessage)
    {
        $this->contactmessage = $contactmessage ;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return [];
    }
}
