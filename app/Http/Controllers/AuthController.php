<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|lowercase|email|max:255|unique:'.User::class,
            'password' => ['required', 'confirmed', Rules\Password::defaults()],

            ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return response()->json([
            'message' => 'User Successfully Registered!',
            'user' => $user
        ]);
}
    public function login(Request $request){
        $login = $request->validate([
            'email' => 'required|email',
            'password' => 'required',

        ]);

        if(!Auth::attempt($login)){
            return response()->json([
                'message' => 'Incorrect Credentials',
            ]);
        }

        $user = Auth::user();
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message' => 'You Successfully Login',
            'login' => $user,
            'token' => $token,
        ]);
    }
}