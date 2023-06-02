<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Articulo;
use App\Models\Prestamo;
use App\Models\Departamento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

use Exception;

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

    public function devolucion(Request $request)
    {
        try {
            if ($request->devolucion) {
                $articulo = Articulo::find($request->articuloId);
                if (is_null($articulo)) {
                    $result = [
                        'success' => false,
                        'message' => 'Este artículo no existe',
                        'datos' => ''
                    ];
                } elseif (!$articulo->prestado){
                    $result = [
                        'success' => false,
                        'message' => 'Este artículo no está en préstamo',
                        'datos' => ''
                    ];
                } else {
                    $prestamos = Prestamo::where('articuloId', $articulo->id)->whereNull('devuelto')->get();
                    foreach ($prestamos as $prestamo) {
                        $prestamo->devuelto = now();
                        $prestamo->devuelveId = $request->user()->id;
                        $prestamo->save();
                    }
                    $articulo->prestado = false;
                    $articulo->save();
                    $result = [
                        'success'=>true,
                        'message' => '',
                        'datos' => $prestamo
                    ];
                }
            } else {
                $result = [
                    'success' => false,
                    'message' => 'No se ha enviado directiva de devolución',
                    'datos' => ''
                ];
            }
            
        } catch (Exception $e) {
            $result = [
                'success' => false,
                'message' => $e,
                'datos' => ''
            ];
        } 
        return $result;
    }
}
