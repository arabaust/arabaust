<?php

namespace Admailer\Listeners;

use Admailer\Events\Log;
use File;
use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Storage;
use Admailer\Models\SiteSettings;
use Admailer\Models\Franchisees;

class LogSender
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
    public function handle(Log $event)
    {
        $client = $event->client;
        $franchisee = Franchisees::where('id', $client->franchisee_id)->get()->first();
        $change = $event->change;

        $settings = SiteSettings::findOrFail(1);
        $emails = explode(';', $settings->notification_email);

        foreach ($emails as $note_email) {
          $this->mailer->send('emails.sendLog', compact(['change', 'client', 'franchisee']), function ($mail) use ($note_email, $change) {
              $mail->to($note_email)
                  ->subject('Franchise Manual App | New ' . $change);
          });
        }

    }
}
