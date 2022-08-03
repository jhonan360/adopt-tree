<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('landing/home');
})->name('landingHome');;

Route::get('/maps', function () {
    return view('landing/maps');
})->name('landingMaps');;


Route::get('/adopt', function () {
    return view('landing/adopt');
})->name('landingAdopt');;

Route::get('/test', function () {
    return ['hola' => 'hola',
    'que' => 'que'
    ];
});
Auth::routes();

Route::get('dashboard/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//tipo plantas
Route::get('dashboard/tipoPlanta', [App\Http\Controllers\PlantasController::class, 'tipoPlanta'])->name('tipoPlanta');
Route::get('dashboard/tipoPlanta/{id}', [App\Http\Controllers\PlantasController::class, 'tipoPlanta'])->name('tipoPlantaShow');
Route::post('dashboard/tipoPlanta/createUpdate', [App\Http\Controllers\PlantasController::class, 'tipoPlantaCreateUpdate'])->name('tipoPlantaCreateUpdate');

// clima
Route::get('dashboard/climas', [App\Http\Controllers\PlantasController::class, 'climas'])->name('climas');
Route::get('dashboard/climas/{id}', [App\Http\Controllers\PlantasController::class, 'climas'])->name('climasShow');
Route::post('dashboard/climas/createUpdate', [App\Http\Controllers\PlantasController::class, 'climasCreateUpdate'])->name('climasCreateUpdate');


// quimicos
Route::get('dashboard/quimicos', [App\Http\Controllers\BitacoraController::class, 'quimicos'])->name('quimicos');
Route::get('dashboard/quimicos/{id}', [App\Http\Controllers\BitacoraController::class, 'quimicos'])->name('quimicosShow');
Route::post('dashboard/quimicos/createUpdate', [App\Http\Controllers\BitacoraController::class, 'quimicosCreateUpdate'])->name('quimicosCreateUpdate');

// medidas
Route::get('dashboard/medidas', [App\Http\Controllers\BitacoraController::class, 'medidas'])->name('medidas');
Route::get('dashboard/medidas/{id}', [App\Http\Controllers\BitacoraController::class, 'medidas'])->name('medidasShow');
Route::post('dashboard/medidas/createUpdate', [App\Http\Controllers\BitacoraController::class, 'medidasCreateUpdate'])->name('medidasCreateUpdate');


// usuarios
Route::get('dashboard/usuarios', [App\Http\Controllers\AdminController::class, 'usuarios'])->name('usuarios');
Route::get('dashboard/usuarios/create', [App\Http\Controllers\AdminController::class, 'usuariosCreate'])->name('usuariosCreate');
Route::post('dashboard/medidas/save', [App\Http\Controllers\BitacoraController::class, 'usuariosSave'])->name('usuariosSave');