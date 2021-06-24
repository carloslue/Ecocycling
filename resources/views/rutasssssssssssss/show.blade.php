@extends('adminlte::page')

@section('template_title')
    {{ $ruta->name ?? 'Show Ruta' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Ruta</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('rutas') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <img src="{{ asset('imagenes/' . $ruta->imagen) }}"
                            alt=" {{ $ruta->imagen }}" height="400px" width="600px">
                        </div>
                        <div class="form-group">
                            <strong>Descripcion Rutas:</strong>
                            {{ $ruta->descripcion_rutas }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
