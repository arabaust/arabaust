<?php

namespace Admailer\Listeners;

use Admailer\Events\AppDownload;
use File;
use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Storage;
use Admailer\Models\SiteSettings;
use Admailer\Models\Franchisees;

class AppDownloadSender
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
    public function handle(AppDownload $event)
    {
        $date = \Carbon\Carbon::now();

        $settings = SiteSettings::findOrFail(1);
        $emails = explode(';', $settings->notification_email);

        foreach ($emails as $note_email) {
          $this->mailer->send('emails.sendAppDownload', compact(['date']), function ($mail) use ($note_email) {
              $mail->to($note_email)
                  ->subject('TEBLAGHA App | New Download App');
          });
        }

    }
}
