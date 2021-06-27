@extends('adminlte::page')

@section('template_title')
    Reservaspromo
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Reservaspromo') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('reservaspromos.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Clienteid</th>
										<th>Promocionid</th>
										<th>Fecha Visita</th>
										<th>Hora</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($reservaspromos as $reservaspromo)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $reservaspromo->name }}</td>
											<td>{{ $reservaspromo->promocionID }}</td>
											<td>{{ $reservaspromo->fecha_visita }}</td>
											<td>{{ $reservaspromo->hora }}</td>

                                            <td>
                                                <form action="{{ route('reservaspromos.destroy',$reservaspromo->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('reservaspromos.show',$reservaspromo->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('reservaspromos.edit',$reservaspromo->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
                                                </form>
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
