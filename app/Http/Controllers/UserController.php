<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Models\Articulo;
use App\Models\Prestamo;
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
                    'datos' => ''
                ];
            } elseif ($articulo->prestado){
                $result = [
                    'success' => false,
                    'message' => 'Este artículo ya está en préstamo',
                    'datos' => ''
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
                    'datos' => $prestamo
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
