<?php

namespace Admailer\Http\Controllers\Auth;

use Admailer\Models\User;
// use Admailer\Traits\CaptchaTrait;
use Input;
use ReCaptcha\ReCaptcha;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use Admailer\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
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

    use AuthenticatesAndRegistersUsers;

    protected $redirectAfterLogout = 'login';
    protected $loginPath = 'login';
    protected $redirectPath = 'en/dashboard';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return User
     */
    protected function create(array $data)
    {
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
    protected function getCredentials(Request $request)
    {
        $field = filter_var($request->input('email'), FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        return [
            $field => $request->input('email'),
            'password' => $request->input('password'),
        ];
    }

    public function postLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required', 'password' => 'required',
            'g-recaptcha-response' => 'required'
        ]);

        // if($this->captchaCheck() == false)
        // {
        //     return redirect($this->loginPath())
        //         ->withInput($request->only('email', 'remember'))
        //         ->withErrors([
        //             'g-recaptcha-response' => 'Warning ReCaptcha',
        //         ]);
        // }

        $credentials = $this->getCredentials($request);

        if (isset($credentials['email'])) {
            $status = User::where('email', $credentials['email'])->first(['status']);
        } else {
            $status = User::where('username', $credentials['username'])->first(['status']);
        }

        if (!is_null($status)) {
            if ($status->status == 1) {
                if (Auth::attempt($credentials, $request->has('remember'))) {
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

    public function captchaCheck()
    {
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
}
