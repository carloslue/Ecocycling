<?php

namespace App\Http\Controllers\cliente;
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
        ->where('clienteID',auth()->id())
        ->get();
       // $reservaspromos = Reservaspromo::paginate();

        return view('cliente.reservaspromo.index', compact('reservaspromos'))
            ->with('i', (request()->input('page', 1) - 1));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users=User::all();
        $promocions=Promocione::all();
        $promocione = new Reservaspromo();
        return view('cliente.reservaspromo.create', compact('promocione'));
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
        $promocione = new Reservaspromo();
        $promocione->clienteID =auth()->id();
        $promocione->promocionID = request('promocionID');
        $promocione->fecha_visita = request('fecha_visita');
        $promocione->hora = request('hora');
        $promocione->save();

        //$reservaspromo = Reservaspromo::create($request->all());

        return redirect()->route('reservasp')
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

        return view('cliente.reservaspromo.show', compact('reservaspromo'));
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

        return view('cliente.reservaspromo.edit', compact('reservaspromo'));
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

        return redirect()->route('reservasp')
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

        return redirect()->route('reservasp')
            ->with('success', 'Reservaspromo deleted successfully');
    }
}
