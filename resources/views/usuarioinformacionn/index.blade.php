@extends('layouts.app')

@section('template_title')
    Informacion
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                              <h3>  {{ __('Informacion de la empresa') }}</h3>
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
                                        
										<th>Mision</th>
										<th>Vision</th>
										<th>General</th>
										<th>Epecifico</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($informacions as $informacion)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $informacion->mision }}</td>
											<td>{{ $informacion->vision }}</td>
											<td>{{ $informacion->general }}</td>
											<td>{{ $informacion->epecifico }}</td>

                                            
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $informacions->links() !!}
            </div>
        </div>
    </div>
@endsection
