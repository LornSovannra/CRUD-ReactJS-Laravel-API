<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    public function User()
    {
        $user = User::all();

        return $user;
    }

    public function Login(Request $request)
    {
        //First Method
        /* Auth::attempt(['email' => $request -> email, 'password' => $request -> password]); */

        //Second Method
        if(!Auth::attempt($request->only('email', 'password')))
        {
            return response([
                'message' => 'Invalid Credentails',
            ], Response::HTTP_UNAUTHORIZED);
        }

        $user = Auth::user();

        $token = $user -> createToken('token') -> plainTextToken;

        $cookie = cookie($token, (60 * 24) * 30); //1 month

        return response([
            'message' => $token
        ]) -> withCookie($cookie);
    }

    public function Logout(Request $request)
    {
        $cookie = Cookie::forget('jwt');

        //Revoke current login token
        /* $request -> user() -> currentAccessToken() -> delete(); */

        return response([
            'message' => 'Logout Successfully',
        ]) -> withCookie($cookie);
    }

    public function Register(Request $request)
    {
        $user = new User();

        $user -> name = $request -> name;
        $user -> email = $request -> email;
        $user -> password = Hash::make($request -> password);
        $user -> token = $token = $user->createToken('myapptoken')->plainTextToken;

        $user -> save();

        return response([
            'message' => 'Register Successfully',
            'token' => $token,
        ], 200);
    }
}