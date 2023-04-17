<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Tymon\JWTAuth\Facades\JWTAuth;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function __construct()
    {
        Auth::shouldUse('api');
    }

    public function signup(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        if($validator->fails())
        {
            return response()->json(['error'=>$validator->errors()->all()],405);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return response()->json([
            'message' => 'Successfully created user!',
            'user' => $user
        ], 200);
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        if($validator->fails())
        {
            return response()->json(['error'=>$validator->errors()->all()],400);
        }

        Config::set('jwt.user', 'App\User'); 
		Config::set('auth.providers.users.model', \App\User::class);
		$token = null;
		
        if ($token = JWTAuth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return response()->json([
                'response' => 'success',
                'result' => [
                    'token' => $token,
                ],
            ]);
        }
        return response()->json([
            'response' => 'error',
            'message' => 'invalid_email_or_password',
        ],400);
    }

    public function logout()
    {   
        if(Auth::check() == false)
        {
            return response()->json([
                'status' => false,
                'message' => 'Unauthorized'
            ], 401);
        }

        Auth::guard('api')->logout();
        return response()->json([
            'message' => 'Successfully logged out'
        ],200);
    }

    public function refresh()
    {
        $token = JWTAuth::getToken();
        try {
            $token = JWTAuth::refresh($token);
            return response()->json(['token' => $token], 200);
        } catch (\Throwable $th) {
            return response()->json($th, 400);
        }
    }

    public function user(Request $request)
    {
        if(Auth::check())
        {
            return response()->json([
                'status' => true,
                'response' => Auth::user(),
            ], 200);
        }
        else{
            return response()->json([
                'status' => false,
            ], 401);
        }
    }
    
}
