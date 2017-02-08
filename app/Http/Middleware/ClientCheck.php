<?php

namespace Admailer\Http\Middleware;

use Closure;

use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Config;

class ClientCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    
    public function handle($request, Closure $next)
    {
        // check if token exists
        Config::set('auth.model', 'Admailer\Models\Clients');
        $token = JWTAuth::getToken();
        if ($token){
            try {
                $client = JWTAuth::toUser($token);

                if (is_null($client)){
                    
                    return response()->json(['error' => 'client_not_found'], 303);
                }elseif ( $client && $client->status == 0 ) {
                    return response()->json(['error' => 'client_inactive'], 301);
                }
            } catch (JWTException $e) {
                return response()->json(['error' => 'token_invalid'], 403);
            }
        }
        else
        {
            return response()->json(['error' => 'Not_logged_in'], 403);
        }

        return $next($request);
    }
}
