@extends('adminlte::page')

@section('template_title')
    {{ $equipo->name ?? 'Show Equipo' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Equipo</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('equipos') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Cantidad:</strong>
                            {{ $equipo->cantidad }}
                        </div>
                        <div class="form-group">
                            <strong>Descripcion Equipo:</strong>
                            {{ $equipo->descripcion_equipo }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
