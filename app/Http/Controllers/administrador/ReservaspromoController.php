<?php

namespace App\Http\Controllers\administrador;
use App\Models\Ruta;
use App\Models\User;
use App\Models\Promocione;
use App\Models\Reservaspromo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * Class ReservaspromoController
 * @package App\Http\Controllers
 */
class ReservaspromoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservaspromos = DB::table('reservaspromos')
        ->join('users', 'users.id', '=', 'reservaspromos.clienteID')
        ->join('promociones', 'promociones.id', '=', 'reservaspromos.promocionID')
        ->select('reservaspromos.*', 'promociones.rutasID','promociones.cantidad','promociones.precio','promociones.fecha_vigencia','users.name')
        ->get();

        return view('Administrador.reservaspromo.index', compact('reservaspromos'))
            ->with('i', (request()->input('page', 1) - 1));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $reservaspromo = new Reservaspromo();
        return view('Administrador.reservaspromo.create', compact('reservaspromo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Reservaspromo::$rules);

        $reservaspromo = Reservaspromo::create($request->all());

        return redirect()->route('reservaspromos.index')
            ->with('success', 'Reservaspromo created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $reservaspromo = Reservaspromo::find($id);

        return view('Administrador.reservaspromo.show', compact('reservaspromo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $reservaspromo = Reservaspromo::find($id);

        return view('Administrador.reservaspromo.edit', compact('reservaspromo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Reservaspromo $reservaspromo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reservaspromo $reservaspromo)
    {
        request()->validate(Reservaspromo::$rules);

        $reservaspromo->update($request->all());

        return redirect()->route('reservaspromos.index')
            ->with('success', 'Reservaspromo updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $reservaspromo = Reservaspromo::find($id)->delete();

        return redirect()->route('reservaspromos.index')
            ->with('success', 'Reservaspromo deleted successfully');
    }
}
