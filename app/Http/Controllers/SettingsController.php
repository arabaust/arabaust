<?php

namespace Admailer\Http\Controllers;

use Auth;
use URL;
use DB;
use Admailer\Http\Requests\SiteSettingsRequest;
use Admailer\Http\Requests\SiteSecuirtyRequest;
use Admailer\Models\SiteSettings;
use Admailer\Models\SiteSecuirty;
use Admailer\Models\SiteTerms;
use Admailer\Models\SiteAbout;
use Admailer\Models\Clients;
use Illuminate\Http\Request;
use Admailer\Http\Requests\StoreAboutUsRequest;
use Admailer\Http\Requests\UpdateAboutUsRequest;
use Admailer\Creators\AboutUsCreator;
use Admailer\Http\Requests;
use Admailer\Http\Controllers\Controller;



class SettingsController extends Controller
{





 /**
     * @var AboutUsCreator
     */
    private $aboutCreator;


    public function __construct(AboutUsCreator $aboutCreator)
    {
       $this->aboutCreator = $aboutCreator;

        $this->middleware('is.allowed');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings = SiteSettings::findOrFail(1);
        return view('settings.index', compact('settings'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $settings = SiteSettings::findOrFail($id);
        $emails = explode(';', $settings->notification_email);
        $user = Auth::user()->username;
        $countries = countriesArray();
        $city = cityArray();
        return view('settings.edit', compact('settings', 'user', 'countries', 'emails', 'city'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\SiteSettingsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
                        dd($request);

        $data = $request->get('notification_email');
        $emails = implode(';', array_filter($data));

        SiteSettings::findOrFail($id)->update([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'notification_email' => $emails,
            'phone_1' => $request->get('phone_1'),
            'phone_2' => $request->get('phone_2'),
            'fax' => $request->get('fax'),
            'country' => $request->get('country'),
            'city' => $request->get('city'),
            'zip_code' => $request->get('zip_code'),
            'physical_address' => $request->get('physical_address'),
            'mailing_address' => $request->get('mailing_address')
        ]);
        flash()->success(trans('common.settings_updated'));
        return redirect(route('settings.index'));
    }

    public function secuirty()
    {
        $secuirty = SiteSecuirty::findOrFail(1);
        return view('settings.secuirty', compact('secuirty'));
    }

    public function updateSecuirty(SiteSecuirtyRequest $request, $id)
    {
        SiteSecuirty::findOrFail($id)->update($request->all());
        flash()->success('Secuirty settings updated!');
        return redirect('secuirty');
    }

    public function terms()
    {
        $terms = SiteTerms::findOrFail(1);
        return view('settings.terms', compact('terms'));
    }

    public function updateTerms(Request $request, $id)
    {
        SiteTerms::findOrFail($id)->update($request->all());
        // When update terms, all franchisee user terms flag = 0
        SiteTerms::where('terms', '=', '1')->update(['terms' => 0]);
        flash()->success(trans('terms.terms_updated'));
        return redirect(route('settings.terms'));
    }

    public function about(Request $request)
    {       
            $about=SiteAbout::findOrFail(1);
           return view('settings.about',compact('about'));
    }

    public function updateAbout(Request $request, $id)
    {
        // SiteAbout::findOrFail($id)->update($request->all());
        $this->aboutCreator->update($request, $id);
        flash()->success(trans('about.about_updated'));
        return redirect(route('settings.about'));
    }



//     public function aboutus(StoreAboutUsRequest $request){
//            $this->aboutCreator->store($request);
//            flash()->success(@trans('about_us.created'));
//            return redirect(route('settings.aboutus'));
//     }

//     public function updateAboutus(Request $request, $id)
// {
//         SiteAbout::findOrFail($id)->update($request->all());
//         flash()->success(trans('about.about_updated'));
//         return redirect(route('settings.about'));
//     }

    

}