<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    public function postLogin(Request $request)
    {
        try {
            $request->validate([
                'email' => 'email|required',
                'password' => 'required',
            ]);

            $user = User::where('email', $request->email)->first();
            if (!$user || !Hash::check($request->password, $user->password)) {
                throw ValidationException::withMessages([
                    'message' => 'Wrong email or password!',
                    'error' => 'Unauthorized',
                ]);
            }
            $accesstoken = $user->createToken($user)->plainTextToken;

            return response()->json([
                'message' => 'Successfully login!',
                'user_logged_in' => $user,
                'access_token' => $accesstoken,
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Wrong email or password!',
                'error' => $e->getMessage(),
            ], 401);
        }
    }

    public function postLogout(Request $request)
    {
        try {
            $user = $request->user();
            $user->currentAccessToken()->delete();
            return response()->json([
                'message' => 'Successfully logout!',
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Failed to logout!',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function postRegister(Request $request)
    {
        try {
            $reqBody = $request->validate([
                'name' => 'required',
                'email' => 'required',
                'password' => 'required',
                'role' => 'required',
                'no_hp' => 'required',
            ]);

            $user = User::create([
                'name' => $reqBody['name'],
                'email' => $reqBody['email'],
                'password' => $reqBody['password'],
                'role' => $reqBody['role'],
                'no_hp' => $reqBody['no_hp'],
            ]);

            return response()->json([
                'message' => 'Successfully create user!',
                'user_registered' => $user,
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Failed to create user!',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
