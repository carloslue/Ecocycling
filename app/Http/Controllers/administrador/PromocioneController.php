<?php

namespace App\Http\Controllers\administrador;

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
            ->select('promociones.*', 'rutas.titulo','equipos.descripcion_equipo')
            ->get();

          

        return view('Administrador.promocione.index', compact('Promociones'))
            ->with('i', (request()->input('page', 1) - 1));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ruta=ruta::all();
        $equipos=equipo::all();
        $promocione = new Promocione();
        return view('Administrador.promocione.create', compact('promocione','ruta','equipos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Promocione::$rules);

        $promocione = Promocione::create($request->all());
      

        return redirect()->route('promociones')
            ->with('success', 'Promocion creado con exito.');
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

        return view('Administrador.promocione.show', compact('promocione'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ruta=ruta::all();
        $equipos=equipo::all();
        $promocione = Promocione::find($id);

        return view('Administrador.promocione.edit', compact('promocione','ruta','equipos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Promocione $promocione
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Promocione $promocione)
    {
        request()->validate(Promocione::$rules);

        $promocione->update($request->all());

        return redirect()->route('promociones')
            ->with('success', 'Promocion actualizado con exito');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $promocione = Promocione::find($id)->delete();

        return redirect()->route('promociones')
            ->with('success', 'Promocion eliminado con exito');
    }
}
