<?php

namespace Admailer\Http\Controllers;

use Admailer\Repositories\DashboardRepository;
use Illuminate\Http\Request;
use Admailer\Http\Requests;
use Admailer\Http\Controllers\Controller;
use Admailer\Models\Clients;
use Admailer\Models\Occasions;
use Admailer\Models\SpecialOffers;
use Admailer\Models\Emergency;
use Admailer\Models\Page;
use Admailer\Models\ContactUs;
use Admailer\Models\Address;
use Admailer\Models\Catogery;
use Admailer\Models\Product;
use Admailer\Models\News;
use Admailer\Models\Article;
use App ;

class DashboardController extends Controller
{
	/**
     * @var DashboardRepository
     */
    private $dashboardRepository;
    public function __construct(DashboardRepository $dashboardRepository)
    {
        $this->dashboardRepository = $dashboardRepository;
        $this->middleware('is.allowed');
    }

    public function index()
    {
        //Clients
        $clients = Clients::orderBy('id', 'desc')->take(5)->get();
        $clients_count = Clients::count();


        //Contact Us
        $ContactUs = ContactUs::orderBy('id', 'desc')->take(5)->get();
        $contact_count = ContactUs::count();

        //Products
        $products = Product::orderBy('id', 'desc')->take(5)->get();
        $products_count = Product::count();



        $lang = App::getLocale() ;

        return view('dashboard.index',
            compact('clients',
                    'clients_count',
                    'ContactUs',
                    'contact_count',              
                    'products',
                    'products_count',                   
                    'lang'
                   ));
    }

    /*
    *
    *
    */

    public function changeLocale(Request $request, $locale )
    {
        if (in_array($locale, config('app.valid_locales'))) {
            app()->setLocale($locale);
        } else {
            app()->setLocale(config('app.locale'));
        }

        $path =  explode('/', $request->get('path'));

        if(isset($path[3])){
            $url = $path[1].'/'.$path[2].'/'.$path[3];

        } elseif(isset($path[2])) {
            $url = $path[1].'/'.$path[2];

        } elseif(isset($path[1])) {
            $url = $path[1];
        }

        return redirect(app()->getLocale() .'/'. $url); 
    }

   
}
    