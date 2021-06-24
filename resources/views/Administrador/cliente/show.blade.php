@extends('adminlte::page')

@section('template_title')
    {{ $cliente->name ?? 'Show Cliente' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Cliente</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('clientes') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $cliente->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Edad:</strong>
                            {{ $cliente->edad }}
                        </div>
                        <div class="form-group">
                            <strong>Dui:</strong>
                            {{ $cliente->dui }}
                        </div>
                        <div class="form-group">
                            <strong>Telefono:</strong>
                            {{ $cliente->telefono }}
                        </div>
                        <div class="form-group">
                            <strong>Usuario:</strong>
                            {{ $cliente->usuario }}
                        </div>
                        <div class="form-group">
                            <strong>Clave:</strong>
                            {{ $cliente->clave }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
