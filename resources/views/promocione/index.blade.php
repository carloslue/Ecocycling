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

                             <div class="float-right">
                                <a href="{{ route('promociones.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
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
                                <thead class="thead table-dark">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Rutasid</th>
										<th>Equipoid</th>
										<th>Cantidad</th>
										<th>Descripcion</th>
										<th>Precio</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody class="table-dark">
                                    @foreach ($promociones as $promocione)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $promocione->rutasID }}</td>
											<td>{{ $promocione->equipoID }}</td>
											<td>{{ $promocione->cantidad }}</td>
											<td>{{ $promocione->descripcion }}</td>
											<td>{{ $promocione->precio }}</td>

                                            <td>
                                                <form action="{{ route('promociones.destroy',$promocione->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('promociones.show',$promocione->id) }}"><i class="fa fa-fw fa-eye"></i> Ver</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('promociones.edit',$promocione->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Eliminar</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $promociones->links() !!}
            </div>
        </div>
    </div>
@endsection
