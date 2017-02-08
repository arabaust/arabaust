<?php

namespace Admailer\Events;

use Admailer\Events\Event;
use Admailer\Models\Clients;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class ResetPass extends Event
{
    use SerializesModels;

    public $client;

    public function __construct($client)
    {
        $this->client = $client;
    }
}
