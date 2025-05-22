<?php

namespace App\Http\Controllers;

use App\Models\Pais;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paises = DB::table('tb_pais')
            ->select('tb_pais.*')
            ->get();
        return view('pais.index', ['paises' => $paises]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $paises = DB::table('tb_pais')
            ->orderBy('pais_capi')
            ->get();
        return view('pais.new', ['paises' => $paises]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pais = new Pais();
        $pais->pais_nomb = $request->input('pais_nomb');
        $pais->pais_capi = $request->input('pais_capi');
        $pais->pais_codi = $request->input('pais_codi');
    
        $pais->save();

        $paises = DB::table('tb_pais')
            ->select('tb_pais.*')
            ->get();
        return view('pais.index', ['paises' => $paises]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pais= Pais::find($id);
        return view('pais.edit', ['pais' => $pais]);

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
        $pais = Pais::findOrFail($id);

        $pais->pais_nomb =$request->input('pais_nomb');
        $pais->pais_capi=$request->input('pais_capi');
        $pais->save();
        return redirect()->route('pais.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         // Busca la comuna por su ID
        $pais = Pais::find($id);
        $pais->delete();
        return redirect()->route('pais.index');
        // Realiza una consulta a la base de datos para obtener los registros de la tabla 'tb_comuna'
        
    }
}
