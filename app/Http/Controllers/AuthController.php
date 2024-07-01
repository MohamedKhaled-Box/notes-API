<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json(['access_token' => $token, 'token_type' => 'Bearer']);
    }
    public function login(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'password' => 'required|string',
            'remember' => 'boolean',
        ]);
        $user = User::where('name', $request['name'])->first();
        // || !$user->hasVerifiedPassword($request['password'])
        if (!$user) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json(['access_token' => $token, 'token_type' => 'Bearer']);
    }
    // public function login(Request $request)
    // {
    //     if (!Auth::attempt($request->only('email', 'password'))) {
    //         return response()->json(['message' => 'Unauthorized'], 401);
    //     }

    //     $user = User::where('email', $request['email'])->firstOrFail();
    //     $token = $user->createToken('auth_token')->plainTextToken;

    //     return response()->json(['access_token' => $token, 'token_type' => 'Bearer']);
    // }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
        return response()->json(['message' => 'Successfully logged out']);
    }
}
