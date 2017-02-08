<?php

namespace Admailer\Listeners;

use Admailer\Events\activeClientSent;
use File;
use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Storage;

class ActiveSender
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
     * @param  activeClientSent  $event
     * @return void
     */
    public function handle(activeClientSent $event)
    {
        $data = $event->franchisee;

        $this->mailer->send('emails.sendActivate', compact('data'), function ($mail) use ($data) {
            $mail->to($data['email'])
                ->subject('TEBLAGHA App | Your Account has been Activated');
        });
    }
}
