<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

Use App\Models\Articulo;
use App\Models\Prestamo;
use App\Models\User;
use Exception;

class UserController extends Controller
{
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
                $prestamo->prestado = now();
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
