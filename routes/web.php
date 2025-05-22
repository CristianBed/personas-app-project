<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Comunacontroller; // Importa el controlador Comunacontroller
use App\Http\Controllers\DepartamentoContoller;
use App\Http\Controllers\MunicipioController;
use App\Http\Controllers\PaisController; // Importa el controlador PaisController 
// Importa el controlador MunicipioController
use App\Models\Comuna;

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
    return view('welcome');
});
//rutas para el controlador de comuna
Route::get('/comuna', [Comunacontroller::class, 'index']) ->name ('comuna.index');
Route ::post('/comuna',[Comunacontroller :: class, 'store']) -> name ('comuna.store'); 
Route ::get ('/comuna/create',[Comunacontroller :: class, 'create']) -> name ('comuna.create');
Route :: delete ('/comuna/{comuna}',[Comunacontroller :: class, 'destroy']) -> name ('comuna.destroy');
Route :: put('/comuna/{comuna}',[Comunacontroller :: class, 'update']) -> name ('comuna.update');
Route :: get ('/comuna/{comuna}/edit',[Comunacontroller :: class, 'edit']) -> name ('comuna.edit');


//Rutas para el controlador de municipio
Route::get('/municipio', [MunicipioController::class, 'index'])->name('municipio.index');
Route:: post('/municipio', [MunicipioController::class, 'store']) ->name('municipio.store');
Route:: get('/municipio/create', [MunicipioController::class, 'create']) ->name('municipio.create');
Route:: delete('/municipio/{municipio}', [MunicipioController::class, 'destroy']) ->name('municipio.destroy');
Route:: put('/municipio/{municipio}', [MunicipioController::class, 'update']) ->name('municipio.update');
Route:: get('/municipio/{municipio}/edit', [MunicipioController::class, 'edit']) ->name('municipio.edit');

//Rutas para el controlador de Departamentos

Route :: get('/departamento',[DepartamentoContoller::class, 'index']) ->name ('departamento.index');
Route :: post('/departamento',[DepartamentoContoller::class, 'store']) ->name ('departamento.store');
Route :: get('/departamento/create',[DepartamentoContoller::class, 'create']) ->name ('departamento.create');
Route :: delete('/departamento/{departamento}',[DepartamentoContoller::class, 'destroy']) ->name ('departamento.destroy');
Route :: put('/departamento/{departamento}',[DepartamentoContoller::class, 'update']) ->name ('departamento.update');
Route :: get('/departamento/{departamento}/edit',[DepartamentoContoller::class, 'edit']) ->name ('departamento.edit');

//Rutas para el controlador de paises
Route::get('/pais', [PaisController::class, 'index'])->name('pais.index');
Route::post('/pais', [PaisController::class, 'store'])->name('pais.store');
Route::get('/pais/create', [PaisController::class, 'create'])->name('pais.create');
Route::delete ('/pais/{pais}', [PaisController::class, 'destroy']) ->name('pais.destroy');
Route ::put ('/pais/{pais}', [PaisController::class, 'update'])->name('pais.update');
Route::get('/pais/{pais}/edit', [PaisController::class, 'edit'])->name('pais.edit');
