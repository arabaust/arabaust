<?php

namespace Admailer\Http\Controllers\Portal;

use Admailer\Models\User;
use Admailer\Models\Clients;
use Input;
use ReCaptcha\ReCaptcha;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use Admailer\Http\Controllers\Controller;
use Socialite;

class AuthPortalController extends Controller{
    
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    protected $redirectAfterLogout  = 'en/portal/portal_login';
    protected $loginPath            = 'en/portal/portal_login';
    protected $redirectPath         = 'en/portal/';
    protected $redirectProfilePath  = 'en/portal/portal_profile/edit';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    
    public function __construct(){
        
    }
    
    /**
     * Show the application login form.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index(){

        $facebook_url   = env('FACEBOOK_LOGIN_URL');
        $twitter_url    = env('TWITTER_LOGIN_URL');
        $google_url     = env('GOOGLE_LOGIN_URL');

        if (view()->exists('auth.portal')) {
            return view('auth.portal',compact('facebook_url','twitter_url','google_url'));
        }

        return view('auth.login');
    }
    
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    
    protected function validator(array $data){
        
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Get the path to the login route.
     *
     * @return string
     */
    
    public function loginPath(){
        
        return property_exists($this, 'loginPath') ? $this->loginPath : '/auth/login';
    }
    
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return User
     */
    
    protected function create(array $data){
        
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    /**
     * Get the needed authorization credentials from the request.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    
    protected function getCredentials(Request $request){
        
        $field = filter_var($request->input('email'), FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        
       
        return [
            $field => $request->input('email'),
            'password' => $request->input('password'),
        ];
        
        
    }

    public function postLogin(Request $request){
        
        $this->validate($request, [
            'email' => 'required', 'password' => 'required',
            'g-recaptcha-response' => 'required'
        ]);

        $credentials = $this->getCredentials($request);

        if (isset($credentials['email'])) {
            $status = User::where('email', $credentials['email'])->first(['status','id']);
        } else {
            $status = User::where('username', $credentials['username'])->first(['status','id']);
        }

        if (!is_null($status)) {
            if ($status->status == 1) {
                if (Auth::attempt($credentials, $request->has('remember'))) {
                    $this->set_session($status->id);
                    return redirect()->intended($this->redirectPath());
                }
            }
        }

        // flash()->error('Wrong credentials!');

        return redirect($this->loginPath())
            ->withInput($request->only('email', 'remember'))
            ->withErrors([
                'email' => $this->getFailedLoginMessage(),
        ]);


    }

    public function captchaCheck(){
        
        $response = Input::get('g-recaptcha-response');
        $remoteip = $_SERVER['REMOTE_ADDR'];
        $secret   = env('RE_CAP_SECRET');

        $recaptcha = new ReCaptcha($secret);
        $resp = $recaptcha->verify($response, $remoteip);
        if ($resp->isSuccess()) {
            return true;
        } else {
            return false;
        }

    }
    
    /**
     * Get the post register / login redirect path.
     *
     * @return string
     */
    
    public function redirectPath(){
        
        if (property_exists($this, 'redirectPath')) {
            return $this->redirectPath;
        }

        return property_exists($this, 'redirectTo') ? $this->redirectTo : '/home';
    }
    
        /**
     * Get the post register / login redirect path.
     *
     * @return string
     */
    
    public function redirectProfilePath(){
        
        if (property_exists($this, 'redirectProfilePath')) {
            return $this->redirectProfilePath;
        }

        return property_exists($this, 'redirectTo') ? $this->redirectTo : '/home';
    }
    
    public function getLogout(){
        
        Auth::logout();

        return redirect(property_exists($this, 'redirectAfterLogout') ? $this->redirectAfterLogout : '/');
    }

    /**
     * application login form Facebook.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function facebook_login(){

        return Socialite::driver('facebook')->redirect();

    }
    
    /**
     * application login form Twitter.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function twitter_login(){

        return Socialite::driver('twitter')->redirect();

    }
    
    /**
     * application login form Google.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function google_login(){

        return Socialite::driver('google')->redirect();

    }
    
    /**
     * callback method form Facebook.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function facebook_callback(){
        
        $user = Socialite::driver('facebook')->stateless()->user();

        $status = Clients::where('email', $user->email)->first(['status','id']);

        if (isset($status->status)) {

            
            return redirect($this->set_session($status->id));
        }
        else
        {
            $FullName = explode(" ", $user->name);

            $user = Clients::create([
                'email' => $user->email,
                'first_name' => $FullName[0],
                'last_name' => $FullName[count($FullName)-1],
                'gender' =>substr($user->user['gender'],0, 1),
                'token' => $user->token,
            ]);
            return redirect($this->set_session($user->id));
        }
    }
    
    /**
     * callback method form Twitter.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function twitter_callback(){
        
        $user = Socialite::driver('twitter')->user();

        $status = Clients::where('email', $user->email)->first(['status']);

        if (isset($status->status)) {

            return redirect($this->set_session($status->id));
        }
        else
        {
            $FullName = explode(" ", $user->name);

            $user = Clients::create([
                'first_name' => $FullName[0],
                'last_name' => $FullName[count($FullName)-1],
                'token' => $user->token,
            ]);
            return redirect($this->set_session($user->id));
            
        }
    }
    
    /**
     * callback method form Google.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function google_callback(){
        
        $user = Socialite::driver('google')->stateless()->user();
        
        $status = Clients::where('email', $user->email)->first(['status']);

        if (isset($status->status)) {

            return redirect($this->set_session($status->id));

        }
        else
        {
            $FullName = explode(" ", $user->name);

            $user = Clients::create([
                'email' => $user->email,
                'first_name' => $FullName[0],
                'last_name' => $FullName[count($FullName)-1],
            ]);
            
            return redirect($this->set_session($user->id));
        }
    }
    
    function set_session($id)
    {

        session()->put('user_id',$id);

        $data = Clients::where('id', $id)->first(['mobile']);
        
        if($data->mobile)
        {
            return $this->redirectPath();
        }
        else 
        {
            return $this->redirectProfilePath();
        }
    }


}
