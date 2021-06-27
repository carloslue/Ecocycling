
  @extends('layouts.app')
            

    

           
            @section('contentt')
            <h3><center><b class="TITULO">PAQUETES QUE OFRECEMOS VEN Y DIVIERTETE</b></center></h3>
          
                <div class="contenedo container ">
                    <div class="row">
                        @foreach ($rutas as $ruta)
                        <div class="columnas col-sm-4">

                            <div class="card">
                                <div class="card-title">
                                    <img class="imagen" src="{{ asset('imagenes/' . $ruta->imagen) }}" alt=" {{ $ruta->imagen }}">
                                </div>
                                
                                <div class="cuerpotargeta bg-info">
                                    {{$ruta->id}}
                                    <br>
                                    <b>Titulo: </b>
                                    {{$ruta->titulo}}
                                    <br>
                                    <b>Descripcion: </b>
                                    {{$ruta->descripcion_rutas}}
                                    <br>
                                    <b>Costo: </b>
                                    {{$ruta->costo}}
                                   
                                </div>
                              
                            </div>
        
                        </div>
                            @endforeach
                        </div>
                        
                        <h3><center><b class="TITULO">PROMOCIONES QUE NO TE PUEDES PERDER</b></center></h3>
          
           
                        <div class="row">
                            @foreach ($Promociones as $promocione)
                            <div class="col-sm-4">
                                <div class="card">
                                    <div class="card-header bg-info">
                                        <div style="display: flex; justify-content: space-between; align-items: center;">
                
                                            <span id="card_title">
                                                {{ __('Promocione') }}
                                            </span>        
                                        </div>
                                    </div>
                                    <div class="card-body bg-success">                       
                                                            {{ ++$i }}
                                                            <br>
                                                            {{ $promocione->titulo}} <br>
                                                            {{ $promocione->descripcion_equipo}} <br>
                                                            {{ $promocione->cantidad }} <br>
                                                            {{ $promocione->descripcion }} <br>
                                                            {{ $promocione->precio }} <br>                          
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                    </div>
              
               
            @endsection
           
         
          
    <style>
        .imagen{
            width: 100%;
            margin-top: 0em;
           }
    
    
    
        .columnas{
            margin-top: 1%;
            margin-bottom: 1%;
        }
        .row{
        
        margin-bottom: 2%;
        background: rgb(2, 1, 17)
        }
        .TITULO{
            color: chartreuse;
        }
        </style>