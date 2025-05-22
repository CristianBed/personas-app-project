<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Comuna;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class Comunacontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comunas =DB:: table('tb_comuna')
        ->join ('tb_municipio', 'tb_comuna.muni_codi', '=', 'tb_municipio.muni_codi')
        ->select('tb_comuna.*', 'tb_municipio.muni_nomb')
        ->get();
        return response()->json(['comunas' => $comunas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $comuna = new Comuna();
        $comuna->comu_nomb = $request->comu_nomb;
        $comuna->muni_codi = $request->muni_codi;
        $comuna->save();

        return json_encode(['comuna' => $comuna]);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comuna = Comuna::find($id);
        $municipios = DB::table('tb_municipio')
            ->orderBy('muni_nomb')
            ->get();
        return json_encode(['comuna' => $comuna, 'municipios' => $municipios]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $comuna = Comuna::find($id);
        $comuna->comu_nomb = $request->comu_nomb;
        $comuna->muni_codi = $request->muni_codi;
        $comuna->save();

        return json_encode(['comuna' => $comuna]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comuna = Comuna::find($id);
        $comuna->delete();
        $comunas = DB::table('tb_comuna')
            ->join('tb_municipio', 'tb_comuna.muni_codi', '=', 'tb_municipio.muni_codi')
            ->select('tb_comuna.*', 'tb_municipio.muni_nomb')
            ->get();
        // Retorna la vista 'comuna.index' y pasa los registros obtenidos como una variable llamada 'comunas'
        return response()->json(['comunas' => $comunas]);
    }
}
