<?php

namespace Admailer\Providers;

use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'Admailer\Events\AdWasSent' => [
            'Admailer\Listeners\AdSender',
        ],
        'Admailer\Events\activeClientSent' => [
            'Admailer\Listeners\ActiveSender',
        ],
        'Admailer\Events\SignUp' => [
            'Admailer\Listeners\SignUpSender',
        ],
        'Admailer\Events\AppDownload' => [
            'Admailer\Listeners\AppDownloadSender',
        ],
        'Admailer\Events\ResetPass' => [
            'Admailer\Listeners\ResetPassSender',
        ],
        'Admailer\Events\ContactAdmin' => [
            'Admailer\Listeners\ContactAdminListener',
        ],
    ];

    /**
     * Register any other events for your application.
     *
     * @param  \Illuminate\Contracts\Events\Dispatcher  $events
     * @return void
     */
    public function boot(DispatcherContract $events)
    {
        parent::boot($events);

        //
    }
}
