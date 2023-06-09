<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

Use App\Models\Articulo;
use App\Models\Prestamo;
use App\Models\User;
use Exception;
use Carbon\Carbon;


class UserController extends Controller
{

    public function register(Request $request)
    {
        $validatedData = $request->validate([
        'dni' => 'required|string|max:9',
        'firstName' => 'required|string|max:255',
        'surnames' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'lang' => 'string',
        'password' => 'required|string|min:8',
        ]);

        $user = User::create([
            'dni' => $validatedData['dni'],
            'firstName' => $validatedData['firstName'],
            'surnames' => $validatedData['surnames'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'lang' => $validatedData['lang'],
            'rol' => 'usuario',
            'enabled' => '1'
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'success' => "OK",
            'message' => "",
            'data' => [
                'token' => $token,
                'nombre' => $user->name,
                'rol' => $user->rol,
            ]
        ]);
    }

    public function prestamo(Request $request)
    {
        try {
            $articulo = Articulo::find($request->articuloId);
            if (is_null($articulo)) {
                $result = [
                    'success' => false,
                    'message' => 'Este artículo no existe',
                    'data' => ''
                ];
            } elseif ($articulo->prestado){
                $result = [
                    'success' => false,
                    'message' => 'Este artículo ya está en préstamo',
                    'data' => ''
                ];
            } else {
                $prestamo = new Prestamo();
                $prestamo->userId = $request->user()->id;
                $prestamo->articuloId = $request->articuloId;
                $prestamo->prestado = Carbon::now()->copy();
                $prestamo->save();
                $articulo->prestado = true;
                $articulo->save();
                $result = [
                    'success'=>true,
                    'message' => '',
                    'data' => ''
                ];
            }
        } catch (Exception $e) {
            $result = [
                'success' => false,
                'message' => $e,
                'data' => ''
            ];
        }
        return $result;
    }

    public function misPrestamos(Request $request)
    {
        try {
            $user = $request->user();
            $prestamos = DB::table('prestamos')
            ->join('articulos', 'prestamos.articuloId', '=', 'articulos.id')
            ->select('prestamos.id', 'articulos.name', 'prestamos.prestado')
            ->where('prestamos.userId', $user->id)
            ->whereNull('prestamos.devuelto')
            ->get();

            $result = [
                'success' => true,
                'message' => '',
                'data' => $prestamos
            ];
        } catch (Exception $e) {
            $result = [
                'success' => false,
                'message' => $e,
                'data' => ''
            ];
        }
        return $result;
    }
}
