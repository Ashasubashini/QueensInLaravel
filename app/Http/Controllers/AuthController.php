<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    /**
     * Register a new user.
     */
    public function register(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8',
            ]);

            $user = User::create([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'password' => Hash::make($validatedData['password']),
            ]);

            return response()->json([
                'user' => $user,
                'message' => 'Registration successful',
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Failed to register user',
                'message' => $e->getMessage(),
            ], 400);
        }
    }

    /**
     * Login a user.
     */
    public function login(Request $request)
    {
        try {
            $credentials = $request->validate([
                'email' => 'required|email',
                'password' => 'required',
            ]);

            if (Auth::attempt($credentials)) {
                $user = Auth::user();
                $token = $user->createToken("auth_token");

                return response()->json([
                    'user' => $user,
                    'message' => 'Successfully logged in',
                    "token" => $token->plainTextToken,
                ], 200);
            }

            return response()->json([
                'error' => 'Invalid credentials',
                'message' => 'The provided email or password is incorrect.',
            ], 401);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Login failed',
                'message' => $e->getMessage(),
            ], 400);
        }
    }

    /**
     * Logout a user.
     */
    public function logout()
    {
        try {
            Auth::logout();

            return response()->json(['message' => 'Successfully logged out'], 200);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Logout failed',
                'message' => $e->getMessage(),
            ], 400);
        }
    }
}
