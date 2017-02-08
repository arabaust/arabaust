<?php

namespace Admailer\Events;

use Admailer\Events\Event;
use Admailer\Models\Ad;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class AdWasSent extends Event
{
    use SerializesModels;
    /**
     * @var \Admailer\Models\Ad
     */
    public $ad;

    /**
     * Create a new event instance.
     *
     * @param \Admailer\Models\Ad $ad
     */
    public function __construct(Ad $ad)
    {
        //
        $this->ad = $ad;
    }
}
