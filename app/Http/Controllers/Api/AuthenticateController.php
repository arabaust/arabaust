<?php

namespace Admailer\Http\Controllers\api;

use Illuminate\Http\Request;
use Config;
use Admailer\Http\Controllers\Controller;

use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

use Admailer\Creators\ClientCreator;
use Admailer\Models\Clients;

use Event;
use Admailer\Events\SignUp;
use Admailer\Events\ResetPass;

class AuthenticateController extends Controller
{

    public function __construct(){

        Config::set('auth.model', 'Admailer\Models\Clients');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * 
     * @return \Illuminate\Http\Response
     */
    
    public function signin(Request $request){

        $credentials = $request->only('email', 'password');

        // first make sure it is an active user
        $user = Clients::where('email', '=', $credentials['email'])->where('status', '=', '1')->get()->first();

        if(!$user){
            return response()->json(['error' => 'unknown_user'], 303);
        }
        else
        {
            $user_id = $user->id;
        }

        try {
            // verify the credentials and create a token for the user
            if (! $token = JWTAuth::attempt($credentials)) {
                
                return response()->json(['error' => 'invalid_credentials'], 303);
            }
            else
            {
                Clients::where(['email' => $credentials['email']])->update([
                    'token' => $token,
                    'device_token' => $request->device_token
                        ]);
            }
            
        } catch (JWTException $e) {
            // something went wrong
            return response()->json(['error' => 'could_not_create_token'], 500);
        }
        
        return response()->json(compact('token','user_id'));

    }

    public function signup(Request $request, ClientCreator $clientCreator){

        // check if the email exists
        $email     = $request->only('email');
        $dublicate = Clients::where('email', '=', $email)->get()->first();
    
        if($dublicate){
            return response()->json(['error' => 'email_exists']);
        }

        try {
            $client = $clientCreator->store($request);
            $client->save();
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }

        // send mail
        Event::fire(new SignUp('Sign Up', $client->id));
        
        $token = JWTAuth::fromUser($client);

        unset($client['password'], $client['created_by'], $client['updated_by'], $client['device_uuid']);

        return response()->json(compact('token', 'client'));
    }

   public function signout(Request $request)
   {

     $this->middleware('jwt.auth');
     $this->middleware('client.check'); // this should be always called after 'jwt.auth'
     $client = JWTAuth::toUser(JWTAuth::getToken());

     // Event::fire(new Log('Sign Out', $client->id));

     JWTAuth::invalidate(JWTAuth::getToken());
     return response()->json(['message' => 'signed_out']);
   }

   public function resetPassword(Request $request)
   {
    
        $data = $request->only('email');
        $email = $data['email'];
        if(!$email){
            return response()->json(['error' => 'email_not_provided']);
        }

        $client = Clients::where('email', '=', $email)->first();
        if(! is_null($client)){
            Event::fire(new ResetPass($client));
            return response()->json(['message' => 'email_sent']);
        }else {
            return response()->json(['error' => 'no_user_found']);
        }

    }

     /**
     * Store a new token in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function save_token(Request $request)
    {
        try {

            Clients::where(['email' => $request->email])->update(['token'=>$request->token]);            
        } catch (JWTException $e) {
            // something went wrong
            return response()->json(['error' => 'could_not_save_token'], 500);
        }
        
        return response()->json(['message' => 'token saved succsseffuly']);
        
    }

}
