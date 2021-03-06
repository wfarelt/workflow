<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('Tipo de Tarea') }}
            {{ Form::select('workflow_tarea_id', $workflow_tareas, $tarea->workflow_tarea_id, ['class' => 'form-control' . ($errors->has('workflow_tarea_id') ? ' is-invalid' : ''), 'placeholder' => 'Seleccionar tarea']) }}
            {{ Form::text('descripcion', null, ['class' => 'form-control' . ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion']) }}
            {{ Form::hidden('user_id',  auth()->user()->id, ['class' => 'form-control' . ($errors->has('tarea_id') ? ' is-invalid' : ''), 'placeholder' => 'Tarea Id']) }}
            
            {!! $errors->first('workflow_tarea_id', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-success">Submit</button>
        <a class="btn btn-primary" href="{{ route('tareas.index') }}"> Back</a>
    </div>

    <tr></tr>


</div>