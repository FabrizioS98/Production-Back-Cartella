<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use App\Http\Requests\AuthRequest;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthLoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
     public function __construct()
    {
        $this->middleware('auth:api' , ['except' => ['login','register','logout']] );
    } 

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */

     public function register(AuthRequest $request)
     {
         $user= User::create([
            'name'=> $request['name'],
            'email'=> $request['email'],
            'specializzazione'=> $request['specializzazione'],
            'password'=> Hash::make( $request['password'])
         ]);
         return $user;
     }

     public function login(AuthLoginRequest $request)
     {
        {
            // Esegui la logica di autenticazione
            $credentials = $request->only('email', 'password');
    
            if ($token = auth()->attempt($credentials)) {
                // Autenticazione riuscita
                return response()->json(['token' => $token, 'message' => 'Authentication successful']);
            } else {
                // Autenticazione fallita
                return response()->json(['message' => 'Invalid credentials'], 401);
            }
        }
     }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */


     
   /*  public function me()
    {
        return response()->json(auth()->user());
    }
 */
    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
   
   
       public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }



    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
   /*  public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    } */

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    /* protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    } */
}