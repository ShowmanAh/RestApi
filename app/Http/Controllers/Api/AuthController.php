<?php

namespace App\Http\Controllers\Api;

use App\User;
//use GuzzleHttp\Client;
use Illuminate\Http\Request;
//use Illuminate\Http\Response;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    public function register(Request $request)
    {

        $validatedData = $request->validate([
            'name'=>'required|max:55',
            'email'=>'email|required|unique:users',
            'password'=>'required|confirmed'
        ]);
        $validatedData['password'] = bcrypt($request->password);
        $user = User::create($validatedData);
        $accessToken = $user->createToken('authToken')->accessToken;
        return response(['user'=> $user, 'access_token'=> $accessToken]);



    }
    // Register end point
    public function login(Request $request){
        $loginData = $request->validate([
            'email' => 'email|required',
            'password' => 'required',
        ]);
        if(!auth()->attempt($loginData)){
            return response(['message' => 'invalid credentials']);
        }
        $accessToken = auth()->user()->createToken('authToken')->accessToken;
        return response(['user' => auth()->user(), 'accessToken' => $accessToken]);


    }
    //login end point
}
