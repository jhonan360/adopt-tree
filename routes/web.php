<?php

use Illuminate\Support\Facades\Route;
use App\Models\Planta;

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
    //return view('landing/maps');
    return view('landing/maps', [
        'plantas' => Planta::all()
    ]);
})->name('landingMaps');


Route::get('/adopt', function () {
    return view('landing/adopt');
})->name('landingAdopt');

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

// plantaPedia
Route::get('dashboard/plantaPedia', [App\Http\Controllers\PlantasController::class, 'plantaPedia'])->name('plantaPedia');
Route::get('dashboard/plantaPedia/{id}', [App\Http\Controllers\PlantasController::class, 'plantaPedia'])->name('plantaPediaShow');
Route::post('dashboard/plantaPedia/createUpdate', [App\Http\Controllers\PlantasController::class, 'plantaPediaCreateUpdate'])->name('plantaPediaCreateUpdate');

// plantas
Route::get('dashboard/plantas', [App\Http\Controllers\PlantasController::class, 'plantas'])->name('plantas');
Route::get('dashboard/plantas/{id}', [App\Http\Controllers\PlantasController::class, 'plantas'])->name('plantasShow');
Route::post('dashboard/plantas/createUpdate', [App\Http\Controllers\PlantasController::class, 'plantasCreateUpdate'])->name('plantaCreateUpdate');

//catalogo
Route::get('dashboard/catalogo', [App\Http\Controllers\PlantasController::class, 'catalogo'])->name('catalogo');
Route::post('dashboard/adoptar', [App\Http\Controllers\PlantasController::class, 'adoptar'])->name('adoptar');

Route::get('dashboard/planta/{id}', [App\Http\Controllers\PlantasController::class, 'planta'])->name('planta');
Route::get('dashboard/misplantas', [App\Http\Controllers\PlantasController::class, 'misPlantas'])->name('misplantas');


// bitacora
Route::get('dashboard/hacerBitacora', [App\Http\Controllers\BitacoraController::class, 'hacerBitacora'])->name('hacerBitacora');
Route::get('dashboard/hacerBitacora/{id}', [App\Http\Controllers\BitacoraController::class, 'hacerBitacora'])->name('hacerBitacoraShow');
Route::post('dashboard/hacerBitacoraCreate', [App\Http\Controllers\BitacoraController::class, 'hacerBitacoraCreate'])->name('hacerBitacoraCreate');
Route::get('dashboard/verBitacora', [App\Http\Controllers\BitacoraController::class, 'verBitacora'])->name('verBitacora');
Route::get('dashboard/verBitacora/{id}', [App\Http\Controllers\BitacoraController::class, 'verBitacora'])->name('verBitacoraShow');



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
Route::post('dashboard/usuarios/save', [App\Http\Controllers\AdminController::class, 'usuariosSave'])->name('usuariosSave');
Route::post('dashboard/usuarios/update', [App\Http\Controllers\AdminController::class, 'usuariosUpdate'])->name('usuariosUpdate');

Route::get('dashboard/miperfil', [App\Http\Controllers\AdminController::class, 'miPerfil'])->name('miPerfil');

//adopciones
Route::get('dashboard/adopciones', [App\Http\Controllers\AdminController::class, 'adopciones'])->name('adopciones');

