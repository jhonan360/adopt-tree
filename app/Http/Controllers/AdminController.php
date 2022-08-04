<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // muestra la vista de los usuarios registrados
    public function usuarios(Request $request){
        $users = User::All();
        return view('dashboard.verUsuario', [
            'users' => $users
        ]);
    }

    // muestra la vista para crear usuarios
    public function usuariosCreate(Request $request){
        return view('dashboard.usuarioCreate');
    }

    // crea un usuario
    public function usuariosSave(Request $request){
        $validData = $request->validate([
            'role' => 'required|integer',
            'tipo_documento' => 'required|string',
            'cedula' => 'required|integer|unique:users',
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'telefono' => 'required|string|size:10|unique:users',

        ]);
        $user = User::create([
            'tipo_documento' => $validData['tipo_documento'],
            'cedula' => $validData['cedula'],
            'nombre' => $validData['nombre'],
            'apellido' => $validData['apellido'],
            'telefono' => $validData['telefono'],
            'email' => $validData['email'],
            'password' => Hash::make($validData['password']),
        ]);
        switch ($validData['role']) {
            case '1':
                $user->assignRole('administrador');
                break;
            case '2':
                $user->assignRole('colaborador');
                break;
            case '3':
                $user->assignRole('cliente');
                break;
        }
        $user->save();

        return redirect('/dashboard/usuarios');
    }
}
