<?php

namespace Admailer\Events;

use Admailer\Events\Event;
use Admailer\Models\Franchisees;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class activeClientSent extends Event
{
    use SerializesModels;
    /**
     * @var \Admailer\Models\Franchisees
     */
    public $franchisee;

    /**
     * Create a new event instance.
     *
     * @param \Admailer\Models\Franchisees $franchisee
     */
    public function __construct($franchisee)
    {
        $this->franchisee = $franchisee;
    }
}
