@extends('layouts.app')

@section('template_title')
    Promocione
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Promocione') }}
                            </span>

                           
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Rutasid</th>
										<th>Equipoid</th>
										<th>Cantidad</th>
										<th>Descripcion</th>
										<th>Precio</th>
                                        <th>valido hasta:</th>

                                        <th>accion</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($Promociones as $promocione)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $promocione->titulo}}</td>
											<td>{{ $promocione->descripcion_equipo}}</td>
											<td>{{ $promocione->cantidad }}</td>
											<td>{{ $promocione->descripcion }}</td>
											<td>{{ $promocione->precio }}</td>
                                            <td>{{ $promocione->fecha_vigencia }}</td>

                                            <td>
                                                  <a class="btn btn-sm btn-primary " href="{{ route('promocion.show',$promocione->id) }}"><i class="fa fa-fw fa-eye"></i>Reservar Promocion </a>
                                                   
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
               
            </div>
        </div>
    </div>
@endsection
