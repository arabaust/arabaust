<?php

namespace Admailer\Listeners;

use Admailer\Events\ContactAdmin;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Contracts\Mail\Mailer;
use Admailer\Models\SiteSettings;
use Event;
use DB ;

class ContactAdminListener
{
    private $email ;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    /**
     * Handle the event.
     *
     * @param  ContactAdmin  $event
     * @return void
     */
    public function handle(ContactAdmin $event)
    {
      $data         = $event->contactmessage ;
      $siteSettings = new SiteSettings ;
      $settings     = DB::table('site_settings')->get();
      $emails       = explode(";",$settings[0]->notification_email);
      foreach ($emails as $email) {
        
        $this->mailer->send('emails.contact', 
            compact('data'), function ($mail) use ($data,$email) {
            $mail->to($email)
                 ->subject('Contact Message');  
        });
      
      } 
    }
}
