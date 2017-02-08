<?php

namespace Admailer\Listeners;

use Admailer\Events\ResetPass;
use File;
use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Storage;

class ResetPassSender
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
    public function handle(ResetPass $event)
    {
        
        $client = $event->client;
        $password = substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil(10/strlen($x)) )),1,10);
        
        $client->update(['password' => bcrypt($password)]);

        $this->mailer->send('emails.sendResetPass', compact(['client', 'password']), function ($mail) use ($client) {
            $mail->to($client->email)->subject('TEBLAGHA App | Reset Password Request');
        });

    }
}
