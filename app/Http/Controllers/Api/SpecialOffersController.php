<?php

namespace Admailer\Http\Controllers\Api;

use Illuminate\Http\Request;

use Admailer\Http\Requests\StoreSpecialOffersRequest;
use Admailer\Http\Requests;
use Admailer\Models\SpecialOffers;
use Admailer\Http\Controllers\Controller;
use Admailer\Creators\SpecialOfferCreator;
use Admailer\Repositories\SpecialOfferRepository;

class SpecialOffersController extends Controller
{
    
    /**
     * @var EmergencyRepository
     */
    private $specialOffersRepository;
    
    /**
     * @var SpecialOffersRepository
     */
    private $specialOfferCreator;
    
    public function __construct(SpecialOfferCreator $specialOfferCreator,SpecialOfferRepository $specialOffersRepository)
    {
        $this->middleware('client.check');
        $this->specialOfferCreator = $specialOfferCreator;
        $this->specialOffersRepository = $specialOffersRepository;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        $SpecialOffers = $this->specialOffersRepository->get_special_offers();
        
        return response()->json(compact('SpecialOffers'));
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function show($id)  {
        
        $SpecialOffers = $this->specialOffersRepository->special_offers_by_id($id);
        
        return response()->json(compact('SpecialOffers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    public function store(StoreSpecialOffersRequest $request) {

        $SpecialOffers  = $this->specialOfferCreator->store($request);
        
        return response()->json(compact('SpecialOffers'));
    }
}
