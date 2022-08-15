<?php

namespace App\Http\Controllers;

use App\Models\Bitacora;
use App\Models\Quimico;
use App\Models\Medida;
use App\Models\Planta;
use App\Models\QuimicoHasBitacora;

use Illuminate\Http\Request;

class BitacoraController extends Controller
{
    // muestra la vista de quimicos
    public function quimicos(Request $request, $id = null){
        $quimico = Quimico::find($id);
        $quimicos = Quimico::All();

        return view('dashboard.quimicos', [
            'quimico' => $quimico,
            'quimicos' => $quimicos
        ]);
    }

    // crea o actualiza quimicos
    public function quimicosCreateUpdate(Request $request){
        $validData = $request->validate([
            'idquimico' => 'nullable',
            'nombre' => 'required|min:5',
            'detalle' => 'string|nullable',
        ]);
        $id = $validData['idquimico'];;

        if($id == '' || $id == null){
            $quimico = new Quimico();
        }else{
            $quimico = Quimico::findOrFail($id);
        }
        $quimico->nombre = $validData['nombre'];
        $quimico->detalle = $validData['detalle'] ?? null;
        $quimico->save();

        return redirect('/dashboard/quimicos');
    }
    
    // muestra la vista de medidas
    public function medidas(Request $request, $id = null){
        $medida = Medida::find($id);
        $medidas = Medida::All();

        return view('dashboard.medidas', [
            'medida' => $medida,
            'medidas' => $medidas
        ]);
    }

    // crea o actualiza medidas
    public function medidasCreateUpdate(Request $request){
        $validData = $request->validate([
            'idmedidas' => 'nullable',
            'nombre' => 'required|min:5'
        ]);
        $id = $validData['idmedidas'];;

        if($id == '' || $id == null){
            $medida = new Medida();
        }else{
            $medida = Medida::findOrFail($id);
        }
        $medida->nombre = $validData['nombre'];
        $medida->save();

        return redirect('/dashboard/medidas');
    }
    
    public function hacerBitacora(Request $request, $id = null){  
        $planta = Planta::find($id);
        $quimicos = Quimico::All();
        $medidas = Medida::All();
        
        return view('dashboard.hacerBitacora', [
            'planta' => $planta,
            'quimicos' => $quimicos,
            'medidas' => $medidas,
        ]);
    }

    public function verBitacora(Request $request, $id = null){  
        $planta = Planta::find($id);
        $bitacoras = Bitacora::where('idplantas', $id)->orderByDesc('created_at')->get();
        
        return view('dashboard.verBitacora', [
            'planta' => $planta,
            'bitacoras' => $bitacoras
        ]);
    }
    
    public function hacerBitacoraCreate(Request $request){
        
        $idplantas = $request->all()['idplantas'];
        $latitud = $request->all()['latitud'];
        $longitud = $request->all()['longitud'];
        $tiempoRiego = $request->all()['tiempoRiego'] ?? null;
        $checkPoda = $request->all()['check-poda'] ?? null;
        $quimicosBitacora = JSON_DECODE($request->all()['quimicosBitacora']);
        
        
        $bitacora = new Bitacora();
        $bitacora->idusuario = auth()->user()->idusuario;
        $bitacora->idplantas = $idplantas;
        $bitacora->hora_riego = $tiempoRiego;
        $bitacora->poda = $checkPoda == null ? 0 : 1;
        $bitacora->save();
        
        if(is_array($quimicosBitacora) && is_iterable($quimicosBitacora)){
            foreach ($quimicosBitacora as $key => $qb) {
                $quimicosHasBitacora = new QuimicoHasBitacora();
                $quimicosHasBitacora->idbitacora = $bitacora->idbitacora;
                $quimicosHasBitacora->idquimico = $qb->idquimico;
                $quimicosHasBitacora->idmedidas = $qb->idmedidas;
                $quimicosHasBitacora->cantidad = $qb->cantidad;
                $quimicosHasBitacora->save();
            }
        }
        dd($bitacora);
        
        return redirect('/dashboard/verBitacora/'.$idplantas);
    }
}
