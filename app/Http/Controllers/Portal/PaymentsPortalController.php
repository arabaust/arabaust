<?php

namespace Admailer\Http\Controllers\Portal;

use Admailer\Creators\NewsCreator;
use Admailer\Http\Requests\StoreNewsRequest;
use Admailer\Http\Requests\UpdateNewsRequest;
use Admailer\Http\Controllers\Controller;
use Admailer\Repositories\NewsPortalRepository;
use Omnipay\Omnipay;

class PaymentsPortalController extends Controller
{

    /**
     * @var NewsPortalRepository
     */
    private $newsRepository;
    /**
     * @var NewsCreator
     */
    private $newsCreator;

    public function __construct( NewsPortalRepository $newsRepository, NewsCreator $newsCreator)
    { 

        $this->newsRepository = $newsRepository;
        $this->newsCreator = $newsCreator;
        // $this->middleware('is.allowed');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    { 

        $gateway = Omnipay::create('PayPal_Express');
        
        //If Card
        //$gateway->setApiKey('abc123');
        
        //If Paypal
        
        $gateway->setUsername('m.hawari-facilitator_api1.premait.com');
        $gateway->setPassword('R56JFY9ZX7SEA5RL');
        $gateway->setSignature('AFcWxV21C7fd0v3bYYYRCpSSRl31ABA1cFMSyr-IjWZ.WUk9a1H9bfP5');
        $gateway->setTestMode(true);
        
        // Example form data
//        $formData = [
//            'number' => '4242424242424242',
//            'expiryMonth' => '6',
//            'expiryYear' => '2017',
//            'cvv' => '123'
//        ];

        // Send purchase request
        $response = $gateway->purchase(
            [
                'amount'                => '2.99',
                'currency'              => 'CAD',
                'description'           => 'Moheb purchase',
                //'transactionId'         => '123',
                //'transactionReference'  => '123ref',
                'returnUrl'             => 'http://localhost:8000/en/portal/portal_response',
                'cancelUrl'             => 'http://localhost:8000/gateways/PayPal_Express/authorize',
            ]
        )->send();
        
        // Process response
        if ($response->isSuccessful()) {

            // Payment was successful
            print_r($response);

        } elseif ($response->isRedirect()) {

            // Redirect to offsite payment gateway
            $response->redirect();

        } else {

            // Payment failed
            echo $response->getMessage();
        }
        


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function response()
    {
        
        dd($_GET['token']);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNewsRequest $request)
    {   

           flash()->success(@trans('news.created'));
           return redirect(route('news.index'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(UpdateNewsRequest $request, $id)
    {
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
}
