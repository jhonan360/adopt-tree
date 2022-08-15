<?php

namespace App\Http\Controllers;

use App\Models\Clima;
use App\Models\Planta;
use App\Models\TipoPlanta;
use App\Models\NombrePlanta;

use Carbon\Carbon;
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

    // muestra la vista de plantaPedia
    public function plantaPedia(Request $request, $id = null){
        $climas = Clima::All();
        $tiposPlantas = TipoPlanta::All();
        $plantaPedias = NombrePlanta::All();
        $plantaPedia = NombrePlanta::find($id);

        return view('dashboard.plantaPedia', [
            'tiposPlantas' => $tiposPlantas,
            'climas' => $climas,
            'plantaPedias' => $plantaPedias,
            'plantaPedia' => $plantaPedia,
        ]);
    }

    // crea o actualiza plantaPedia
    public function plantaPediaCreateUpdate(Request $request){
        
        $id = $request->all()['idnombre'] ?? null;
        
        if($id == '' || $id == null){
            $plantaPedia = new NombrePlanta();
            $validData = $request->validate([
                'idnombre' => 'nullable',
                'idclimas' => 'required',
                'idtipo_planta' => 'required',
                'nombre_cientifico' => 'required|min:5|unique:nombres_plantas',
                'nombre_comun' => 'required|min:5|unique:nombres_plantas',
                'detalle' => 'string|nullable',
            ]);
        }else{
            $validData = $request->validate([
                'idnombre' => 'nullable',
                'idclimas' => 'required',
                'idtipo_planta' => 'required',
                'nombre_cientifico' => 'required|min:5',
                'nombre_comun' => 'required|min:5',
                'detalle' => 'string|nullable',
            ]);
            $plantaPedia = NombrePlanta::findOrFail($id);
        }
        $plantaPedia->nombre_cientifico = $validData['nombre_cientifico'];
        $plantaPedia->nombre_comun = $validData['nombre_comun'];
        $plantaPedia->idtipo_planta = $validData['idtipo_planta'];
        $plantaPedia->idclimas = $validData['idclimas'];
        $plantaPedia->detalle = $validData['detalle'] ?? null;
        $plantaPedia->save();

        return redirect('/dashboard/plantaPedia');
    }

    // muestra la vista de plantas para crear
    public function plantas(Request $request, $id = null){
        $planta = Planta::find($id);
        $plantas = Planta::all();
        $plantaPedia = NombrePlanta::All();

        return view('dashboard.plantas', [
            'planta' => $planta,
            'plantas' => $plantas,
            'plantaPedia' => $plantaPedia
        ]);
    }

     // crea o actualiza planta
    public function plantasCreateUpdate(Request $request){
        
        $id = $request->all()['idplantas'] ?? null;
        
        $validData = $request->validate([
            'idnombre' => 'required',
            'latitud' => 'required',
            'longitud' => 'required',
        ]);
        //dd($id,$validData);
        if($id == '' || $id == null){
            $planta = new Planta();
            $planta->fecha_ingreso = Carbon::now();;
        }else{
            $planta = Planta::findOrFail($id);
        }
        $planta->idnombre = $validData['idnombre'];
        $planta->latitud = $validData['latitud'];
        $planta->longitud = $validData['longitud'];
        $planta->save();

        return redirect('/dashboard/plantas');
    }
}
