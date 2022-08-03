<?php

namespace App\Http\Controllers;

use App\Models\TipoPlanta;
use App\Models\Clima;

use Illuminate\Http\Request;

class PlantasController extends Controller
{
    // muestra la vista de tipos plantas
    public function tipoPlanta(Request $request, $id = null){
        $tipoPlanta = TipoPlanta::find($id);
        $tiposPlantas = TipoPlanta::All();

        return view('dashboard.tipoArbol', [
            'tipoPlanta' => $tipoPlanta,
            'tiposPlantas' => $tiposPlantas
        ]);
    }

    // crea o actualiza tipos de plantas
    public function tipoPlantaCreateUpdate(Request $request){
        $validData = $request->validate([
            'idTipo_planta' => 'nullable',
            'nombre' => 'required|min:5',
            'detalle' => 'string|nullable',
        ]);
        $id = $validData['idTipo_planta'];;

        if($id == '' || $id == null){
            $tipoPlanta = new TipoPlanta();
        }else{
            $tipoPlanta = TipoPlanta::findOrFail($id);
        }
        $tipoPlanta->nombre = $validData['nombre'];
        $tipoPlanta->detalle = $validData['detalle'] ?? null;
        $tipoPlanta->save();

        return redirect('/dashboard/tipoPlanta');
    }

    // muestra la vista de climas
    public function climas(Request $request, $id = null){
        $clima = Clima::find($id);
        $climas = Clima::All();

        return view('dashboard.climas', [
            'clima' => $clima,
            'climas' => $climas
        ]);
    }

    // crea o actualiza climas
    public function climasCreateUpdate(Request $request){
        $validData = $request->validate([
            'idclimas' => 'nullable',
            'nombre' => 'required|min:5',
            'detalle' => 'string|nullable',
        ]);
        $id = $validData['idclimas'];;

        if($id == '' || $id == null){
            $clima = new Clima();
        }else{
            $clima = Clima::findOrFail($id);
        }
        $clima->nombre = $validData['nombre'];
        $clima->detalle = $validData['detalle'] ?? null;
        $clima->save();

        return redirect('/dashboard/climas');
    }
}
