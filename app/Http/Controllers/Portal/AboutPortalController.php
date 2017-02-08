<?php

namespace Admailer\Http\Controllers\portal;

use Illuminate\Http\Request;
use Admailer\Creators\AboutUsCreator;
use Admailer\Http\Requests\StoreAboutUsRequest;
use Admailer\Http\Requests\UpdateAboutUsRequest;
use Admailer\Http\Controllers\Controller;
use Admailer\Repositories\AboutUsRepository;
use Admailer\Models\SiteAbout;

use App;

class AboutPortalController extends Controller
{
    /**
     * @var AboutUsRepository
     */
    private $aboutRepository;
   

    public function __construct( AboutUsRepository $aboutRepository)
    { 

        $this->aboutRepository = $aboutRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    { 
    $aboutus = SiteAbout::findOrFail(1);
    return view('portal.aboutus', compact('aboutus'));
     
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAboutUsRequest $request)
    {   

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {//
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

    public function update(UpdateAboutUsRequest $request, $id)
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
