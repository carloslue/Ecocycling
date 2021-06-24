<?php

namespace App\Http\Controllers\administrador;

use App\Models\Ruta;
use Illuminate\Http\Request;

/**
 * Class RutaController
 * @package App\Http\Controllers
 */
class RutaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rutas = Ruta::paginate();

        return view('Administrador.ruta.index', compact('rutas'))
            ->with('i', (request()->input('page', 1) - 1) * $rutas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ruta = new Ruta();
        return view('Administrador.ruta.create', compact('ruta'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Ruta::$rules);

        //$ruta = Ruta::create($request->all());

        $ruta = new Ruta();
        if($request->hasFile('imagen')){
            $file = $request->imagen;
            $file->move(public_path() .'/imagenes',$file->getClientOriginalName());
            $ruta->imagen = $file->getClientOriginalName();
        }
        $ruta->titulo = request('titulo');
        $ruta->descripcion_rutas = request('descripcion_rutas');
        $ruta->costo = request('costo');
       
        $ruta->save();

        return redirect()->route('rutas')
            ->with('success', 'Ruta creada con exito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ruta = Ruta::find($id);

        return view('Administrador.ruta.show', compact('ruta'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ruta = Ruta::find($id);

        return view('Administrador.ruta.edit', compact('ruta'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Ruta $ruta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ruta $ruta)
    {
        request()->validate(Ruta::$rules);

        //$ruta->update($request->all());
        $ruta = update::find($id);
        if($request->hasFile('imagen')){
            $file = $request->imagen;
            $file->move(public_path() .'/imagenes',$file->getClientOriginalName());
            $ruta->imagen = $file->getClientOriginalName();
        }
        $ruta->descripcion_rutas = request('descripcion_rutas');
       
        $ruta->save();
        return redirect()->route('rutas')
            ->with('success', 'Ruta updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $ruta = Ruta::find($id)->delete();

        return redirect()->route('rutas')
            ->with('success', 'Ruta deleted successfully');
    }
}
