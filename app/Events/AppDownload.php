<?php

namespace Admailer\Events;

use Admailer\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class AppDownload extends Event
{
    use SerializesModels;
}
