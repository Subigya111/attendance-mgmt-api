<?php

namespace App\Http\Controllers;
use Illuminate\Validation\Rules\Password;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\Authentication\RegisterRequest;
use App\Http\Requests\Authentication\LoginRequest;
use Illuminate\Support\Facades\Hash;

class AuthenticationController extends Controller
{
    public function register(RegisterRequest $request)
    {

         $validated=$request->validated();
         $user=User::create($validated);
         return response()->json([
            'message'=>'User registered',
            'user' => $user,
        ], 201);
    }

    


    public function login(LoginRequest $request)
    {
        $validated=$request->validated();
        $user=User::where('email',$validated['email'])->first();
        if(!$user||(!Hash::check($validated['password'],$user->password))){
            return 'Invalid Credentials';
        }
        $deviceName=$request->header('User-agent','Unknown Device');
        $token = $user->createToken($deviceName)->plainTextToken;
        return response()->json([
            'message'=>'You are logged in'
        ],200);
        
    }

   
    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
        return response()->json([
            'message'=>'You are logged out'
        ],200);
    }

  
}
