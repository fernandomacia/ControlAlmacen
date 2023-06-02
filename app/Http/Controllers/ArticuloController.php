<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Articulo;

class ArticuloController extends Controller
{
    public function getArticulo(Request $request)
    {
        return Articulo::find($request);
    }
}
