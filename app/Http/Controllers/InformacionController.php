<?php

namespace App\Http\Controllers;

use App\Models\Informacion;
use Illuminate\Http\Request;

/**
 * Class InformacionController
 * @package App\Http\Controllers
 */
class InformacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $informacions = Informacion::paginate();

        return view('informacion.index', compact('informacions'))
            ->with('i', (request()->input('page', 1) - 1) * $informacions->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $informacion = new Informacion();
        return view('informacion.create', compact('informacion'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Informacion::$rules);

        $informacion = Informacion::create($request->all());

        return redirect()->route('informacions.index')
            ->with('success', 'Informacion creado correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $informacion = Informacion::find($id);

        return view('informacion.show', compact('informacion'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $informacion = Informacion::find($id);

        return view('informacion.edit', compact('informacion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Informacion $informacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Informacion $informacion)
    {
        request()->validate(Informacion::$rules);

        $informacion->update($request->all());

        return redirect()->route('informacions.index')
            ->with('success', 'Informacion updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $informacion = Informacion::find($id)->delete();

        return redirect()->route('informacions.index')
            ->with('success', 'Informacion deleted successfully');
    }
}
