<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\Comunacontroller;
use App\Http\Controllers\api\Municipiocontroller;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/comunas', [Comunacontroller::class, 'index'])->name('comunas');
Route::post('/comunas', [Comunacontroller::class, 'store'])->name('comunas.store');
Route::get('/comunas/{comunas}', [Comunacontroller::class, 'show'])->name('comunas.show');
Route::put('/comunas/{comunas}', [Comunacontroller::class, 'update'])->name('comunas.update');
Route::delete('/comunas/{comunas}', [Comunacontroller::class, 'destroy'])->name('comunas.destroy');

Route::get('/municipios', [Municipiocontroller::class, 'index'])->name('municipios');