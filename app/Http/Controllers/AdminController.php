<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;

class AdminController extends Controller
{
     // muestra la vista de usuarios
     public function usuarios(Request $request){
        $users = User::All();
        $users = User::find(1);
dd($users->getRoleNames());
        return view('dashboard.verUsuario', [
            'users' => $users
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
}
