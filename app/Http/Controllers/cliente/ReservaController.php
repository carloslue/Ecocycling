<?php

namespace App\Http\Controllers\cliente;

use App\Models\Reserva;
use App\Models\Ruta;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * Class ReservaController
 * @package App\Http\Controllers
 */
class ReservaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservas = DB::table('reservas')
            ->join('users', 'users.id', '=', 'reservas.clienteID')
            ->join('rutas', 'rutas.id', '=', 'reservas.rutaID')
            ->select('reservas.*', 'rutas.descripcion_rutas','users.name')
            ->where('clienteID',auth()->id())
            ->get();
    

        return view('cliente.usuarioreserva.index', compact('reservas'))
            ->with('i', (request()->input('page', 1) - 1));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rutas=Ruta::all();
        $users=User::all();
        $reserva = new Reserva();
        return view('cliente.usuarioreserva.create', compact('reserva','rutas','users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Reserva::$rules);

       // $reserva = Reserva::create($request->all());
       $reserva = new Reserva();
       $reserva->clienteID =auth()->id();
       $reserva->rutaID = request('rutaID');
       $reserva->fecha = request('fecha');
       $reserva->hora = request('hora');
       $reserva->cantidad = request('cantidad');
       $reserva->telefono = request('telefono');
       $reserva->save();

        return redirect()->route('reservaindex')
            ->with('success', 'Reserva creado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $reserva = Reserva::find($id);

        return view('cliente.usuarioreserva.show', compact('reserva'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rutas=Ruta::all();
        $clientes=Cliente::all();
        $reserva = Reserva::find($id);

        return view('cliente.usuarioreserva.edit', compact('reserva','rutas','clientes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Reserva $reserva
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reserva $reserva)
    {
        request()->validate(Reserva::$rules);

        $reserva->update($request->all());

        return redirect()->route('reservaindex')
            ->with('success', 'Reserva actualizado exitosamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $reserva = Reserva::find($id)->delete();

        return redirect()->route('reservaindex')
            ->with('success', 'Reserva eliminada');
    }
}
