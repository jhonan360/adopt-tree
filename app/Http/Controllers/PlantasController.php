<?php

namespace App\Http\Controllers;

use App\Models\TipoPlanta;

use Illuminate\Http\Request;

class PlantasController extends Controller
{
    // muestra la vista de tipos plantas
    public function tipoPlanta(Request $request){

        $tiposPlantas = TipoPlanta::All();
        dd($tiposPlantas);die;

    }
}
