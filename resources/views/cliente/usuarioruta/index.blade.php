@extends('layouts.app')

@section('template_title')
    Ruta
@endsection

@section('content')
<h5> <b><center>RUTAS A LAS QUE PUEDES HACER TUS RECORRIDOS SI NOS VISITAS</center></b></h5>
    <div class="contenedor container-fluid " >
     
        <div class="row">
            
            @foreach ($rutas as $ruta)
            
                <div class="columnas col-sm-3">

                    <div class="card">
                        
                        <div class="cuerpotargeta">
                            <img class="imagen" src="{{ asset('imagenes/' . $ruta->imagen) }}" alt=" {{ $ruta->imagen }}">
                            <a class="btn btn-sm btn-primary " href="{{ route('ruta.show', $ruta->id) }}"><i
                                class="fa fa-fw fa-eye"></i> ver informacion de la imagen</a> 
                        </div>
                      
                    </div>

                </div>
            @endforeach
         
        </div>
        
    </div>

    
    </div>
@endsection

<style>
    .imagen{
        width: 100%;
        margin-top: 0em;
       }


    .btn{
           width: 100%;
          
       
    }

    .columnas{
        margin-top: 1%;
        margin-bottom: 1%;
    }
    .row{
    
    margin-bottom: 2%;
    background: rgb(2, 1, 17)
    }
    </style>
