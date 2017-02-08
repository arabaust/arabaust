<?php

namespace Admailer\Listeners;

use Admailer\Events\SignUp;
use File;
use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Storage;
use Admailer\Models\SiteSettings;

class SignUpSender
{
    /**
     * @var \Illuminate\Contracts\Mail\Mailer
     */
    private $mailer;

    /**
     * Create the event listener.
     *
     * @param \Illuminate\Contracts\Mail\Mailer $mailer
     */
    public function __construct(Mailer $mailer)
    {
        //
        $this->mailer = $mailer;
    }

    /**
     * Handle the event.
     *
     * @param  SignUp  $event
     * @return void
     */
    public function handle(SignUp $event)
    {
        $client = $event->client;
        $change = $event->change;

        $settings = SiteSettings::findOrFail(1);


          $this->mailer->send('emails.sendLog', compact('client'), function ($mail) use ($client) {
              $mail->to($client->email)
                  ->subject('TEBLAGHA App | Registration');
          });

    }
}
