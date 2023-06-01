<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use App\Models\User;
use App\Models\Departamento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function register(Request $request)
    {
        $validatedData = $request->validate([
        'dni' => 'required|string|max:9',
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8',
        ]);

        $user = User::create([
            'dni' => $validatedData['dni'],
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'success' => 'OK',
            'message' => "",
            'token' => $token,
        ]);
    }

    public function getUsers(Request $request)
    {
        return User::all();
    }

    public function getDepartamentos(Request $request)
    {
        return Departamento::all();
    }

    public function getArticulos(Request $request)
    {
        return Articulo::all();
    }
}
