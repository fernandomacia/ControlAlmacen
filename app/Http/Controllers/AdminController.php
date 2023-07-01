<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Articulo;
use App\Models\Prestamo;
use App\Models\Departamento;
use Illuminate\Http\Request;
use Carbon\Carbon;

use Exception;

class AdminController extends Controller
{
        public function devolucion(Request $request)
    {
        try {
            if ($request->devolucion) {
                $articulo = Articulo::find($request->articuloId);
                if (is_null($articulo)) {
                    $result = [
                        'success' => false,
                        'message' => 'Este artículo no existe',
                        'data' => ''
                    ];
                } elseif (!$articulo->prestado){
                    $result = [
                        'success' => false,
                        'message' => 'Este artículo no está en préstamo',
                        'data' => ''
                    ];
                } else {
                    $prestamos = Prestamo::where('articuloId', $articulo->id)->whereNull('devuelto')->get();
                    foreach ($prestamos as $prestamo) {
                        $prestamo->devuelto = Carbon::now()->copy();
                        $prestamo->devuelveId = $request->user()->id;
                        $prestamo->save();
                    }
                    $articulo->prestado = false;
                    $articulo->save();
                    $result = [
                        'success'=>true,
                        'message' => '',
                        'data' => ''
                    ];
                }
            } else {
                $result = [
                    'success' => false,
                    'message' => 'No se ha enviado directiva de devolución',
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

    public function getPrestamos(Request $request)
    {
        $prestamos = Prestamo::whereNull('devuelto')->get();
        return $prestamos;
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

    public function getAllPrestamos(Request $request)
    {
        return Prestamo::all();
    }
}
