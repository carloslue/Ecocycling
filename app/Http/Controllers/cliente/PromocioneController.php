<?php

namespace App\Http\Controllers\cliente;

use App\Models\Promocione;
use App\Models\Equipo;
use App\Models\Ruta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * Class PromocioneController
 * @package App\Http\Controllers
 */
class PromocioneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     
        
            $Promociones = DB::table('promociones')
            ->join('equipos', 'equipos.id', '=', 'promociones.equipoID')
            ->join('rutas', 'rutas.id', '=', 'promociones.rutasID')
            ->select('promociones.*', 'rutas.descripcion_rutas','equipos.descripcion_equipo')
            ->get();

          

        return view('cliente.usuariopromocione.index', compact('Promociones'))
            ->with('i', (request()->input('page', 1) - 1));
    }

   
    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $promocione = Promocione::find($id);

        return view('cliente.usuariopromocione.show', compact('promocione'));
    }

    

   
}
