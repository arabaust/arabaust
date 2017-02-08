<?php

namespace Admailer\Http\Controllers\Portal;

use Admailer\Http\Requests\Portal\StoreContactUsRequest;
use Admailer\Http\Controllers\Controller;
use Admailer\Models\Portal\ContactUsPortal;
use Admailer\Events\activeClientSent;
use Admailer\Events\ContactAdmin;
use Admailer\Models\SiteSettings;
use Event;
use DB ;

class ContactPortalController extends Controller
{

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }
    
    /**
     * Show the application Home form.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function create()
    {
        return view('portal.contact_us');
    }

    public function store(StoreContactUsRequest $request)
    {

      $contactUsPortal = new ContactUsPortal ;
      $contactUsPortal->title = $request['title'];
      $contactUsPortal->description = 
      $request['description'];
      $contactUsPortal->email = $request['email'];
      $contactUsPortal->phone = $request['phone'];
      $contactUsPortal->save();

      Event::fire(new ContactAdmin($request->all()));
        return redirect(route('contact_us.create'));

    }


    
    
}
