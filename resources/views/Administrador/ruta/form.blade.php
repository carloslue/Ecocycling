<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('imagen') }}
            {{ Form::file('imagen', $ruta->imagen, ['class' => 'form-control' . ($errors->has('imagen') ? ' is-invalid' : ''), 'placeholder' => 'Imagen']) }}
            {!! $errors->first('imagen', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('descripcion_rutas') }}
            {{ Form::text('descripcion_rutas', $ruta->descripcion_rutas, ['class' => 'form-control' . ($errors->has('descripcion_rutas') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion Rutas']) }}
            {!! $errors->first('descripcion_rutas', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>