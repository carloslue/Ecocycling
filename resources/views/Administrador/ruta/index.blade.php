@extends('adminlte::page')

@section('template_title')
    Ruta
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Ruta') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('rutas.create') }}" class="btn btn-primary btn-sm float-right"
                                    data-placement="left">
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

                                        <th>Imagen</th>
                                        <th>Titulo</th>
                                        <th>Descripcion Rutas</th>
                                        <th>Precio</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($rutas as $ruta)
                                        <tr>
                                            <td>{{ ++$i }}</td>

                                            <td>
                                                <img src="{{ asset('imagenes/' . $ruta->imagen) }}"
                                                    alt=" {{ $ruta->imagen }}" height="100px" width="100px">
                                            </td>
                                            <td>{{ $ruta->titulo }}</td>
                                            <td>{{ $ruta->descripcion_rutas }}</td>
                                            <td>{{ $ruta->costo }}</td>

                                            <td>
                                                <form action="{{ route('rutas.destroy', $ruta->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary "
                                                        href="{{ route('rutas.show', $ruta->id) }}"><i
                                                            class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success"
                                                        href="{{ route('rutas.edit', $ruta->id) }}"><i
                                                            class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i
                                                            class="fa fa-fw fa-trash"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $rutas->links() !!}
            </div>
        </div>
    </div>
@endsection
