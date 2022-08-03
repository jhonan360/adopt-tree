<?php

namespace App\Http\Controllers;

use App\Models\Quimico;
use App\Models\Medida;

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
}
