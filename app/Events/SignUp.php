<?php

namespace Admailer\Events;

use Admailer\Events\Event;
use Admailer\Models\Clients;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class SignUp extends Event
{
    use SerializesModels;

    public $change;
    public $client;

    public function __construct($change, $client_id)
    {
        $this->change = $change;
        $this->client = Clients::find($client_id);
    }
}
