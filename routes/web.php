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
Route::get('dashboard/tipoPlanta', [App\Http\Controllers\PlantasController::class, 'tipoPlanta'])->name('tipoPlanta');
