<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Municipio; // Importa el modelo Municipio
use Illuminate\Support\Facades\DB; // Importa la fachada DB para realizar consultas a la base de datos
class MunicipioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $municipios = DB::table('tb_municipio') // Realiza una consulta a la tabla 'tb_municipio'
            ->join('tb_departamento', 'tb_municipio.depa_codi', '=', 'tb_departamento.depa_codi') // Realiza una unión con la tabla 'tb_departamento'
            ->select('tb_municipio.*', 'tb_departamento.depa_nomb')
            ->get();  // Selecciona todas las columnas de 'tb_municipio' y la columna 'depa_nomb' de 'tb_departamento'
        return view('municipio.index', ['municipios' => $municipios]); // Retorna la vista 'municipio.index' y pasa los registros obtenidos como una variable llamada 'municipios'
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departamentos = DB::table('tb_departamento') // Realiza una consulta a la tabla 'tb_departamento'
            ->orderBy('depa_nomb') // Ordena los resultados por la columna 'depa_nomb'
            ->get(); // Obtiene todos los registros de la tabla
        return view('municipio.new', ['departamentos' => $departamentos]); // Retorna la vista 'municipio.new' y pasa los registros obtenidos como una variable llamada 'municipios'
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $municipio = new Municipio(); // Crea una nueva instancia del modelo Municipio
        $municipio->muni_nomb = $request->name; // Asigna el nombre del municipio desde la solicitud
        $municipio->depa_codi = $request->code; // Asigna el código del departamento desde la solicitud
        $municipio->save(); // Guarda el nuevo municipio en la base de datos

        $municipios = DB::table('tb_municipio') // Realiza una consulta a la tabla 'tb_municipio'
            ->join('tb_departamento', 'tb_municipio.depa_codi', '=', 'tb_departamento.depa_codi') // Realiza una unión con la tabla 'tb_departamento'
            ->select('tb_municipio.*', 'tb_departamento.depa_nomb') // Selecciona todas las columnas de 'tb_municipio' y la columna 'depa_nomb' de 'tb_departamento'
            ->get(); // Obtiene todos los registros de la tabla
        return view('municipio.index', ['municipios' => $municipios]); // Retorna la vista 'municipio.index' y pasa los registros obtenidos como una variable llamada 'municipios'
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
        $municipio = Municipio::find($id); // Busca el municipio por su ID
        $departamentos = DB::table('tb_departamento') // Realiza una consulta a la tabla 'tb_departamento'
            ->orderBy('depa_nomb') // Ordena los resultados por la columna 'depa_nomb'
            ->get(); // Obtiene todos los registros de la tabla
        return view('municipio.edit', ['municipio' => $municipio, 'departamentos' => $departamentos]); // Retorna la vista 'municipio.edit' y pasa el municipio y los departamentos como variables
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
        $municipio = Municipio::find($id); // Busca el municipio por su ID
        $municipio->muni_nomb = $request->name; // Asigna el nuevo nombre del municipio desde la solicitud
        $municipio->depa_codi = $request->code; // Asigna el nuevo código del departamento desde la solicitud
        $municipio->save(); // Guarda los cambios en la base de datos

        $municipios = DB::table('tb_municipio') // Realiza una consulta a la tabla 'tb_municipio'
            ->join('tb_departamento', 'tb_municipio.depa_codi', '=', 'tb_departamento.depa_codi') // Realiza una unión con la tabla 'tb_departamento'
            ->select('tb_municipio.*', 'tb_departamento.depa_nomb') // Selecciona todas las columnas de 'tb_municipio' y la columna 'depa_nomb' de 'tb_departamento'
            ->get(); // Obtiene todos los registros de la tabla
        return view('municipio.index', ['municipios' => $municipios]); // Retorna la vista 'municipio.index' y pasa los registros obtenidos como una variable llamada 'municipios'
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $municipio = Municipio::find($id); // Busca el municipio por su ID
        $municipio->delete();

        $municipios = DB::table('tb_municipio') // Realiza una consulta a la tabla 'tb_municipio'
            ->join('tb_departamento', 'tb_municipio.depa_codi', '=', 'tb_departamento.depa_codi') // Realiza una unión con la tabla 'tb_departamento'
            ->select('tb_municipio.*', 'tb_departamento.depa_nomb') // Selecciona todas las columnas de 'tb_municipio' y la columna 'depa_nomb' de 'tb_departamento'
            ->get(); // Obtiene todos los registros de la tabla
        return view('municipio.index', ['municipios' => $municipios]); // Retorna la vista 'municipio.index' y pasa los registros obtenidos como una variable llamada 'municipios'

        // Elimina el municipio de la base de datos
    }
}
