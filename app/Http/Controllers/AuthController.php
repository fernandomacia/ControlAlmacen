<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function login(Request $request)
    {
        if (!Auth::attempt($request->only('email', 'password'))) {
        return response()->json([
        'success' => 'ERROR',
        'message' => 'Invalid login details'
                ], 401);
            }

        $user = User::where('email', $request['email'])->firstOrFail();

        if ($user->enabled) {

            $token = $user->createToken('auth_token')->plainTextToken;

            return response()->json([
                    'success' => "OK",
                    'message' => "",
                    'data' => [
                        'token' => $token,
                        'nombre' => $user->name,
                        'rol' => $user->rol,
                        'lang' => $user->lang
                    ]
            ]);
        } else {
            return response()->json([
                'success' => 'ERROR',
                'message' => 'INVALID_USER'
                        ], 403);
        }

    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return [
            'message' => 'Token Revoked'
        ];
    }

    public function user(Request $request)
    {
        return $request->user();
    }
}
