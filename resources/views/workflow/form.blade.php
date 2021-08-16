@csrf
<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('workflow_tarea_id',"Tipo de tarea:") }}
            {{ Form::select('workflow_tarea_id', $workflow_tareas, $workflow->workflow_tarea_id, ['class' => 'form-control']) }}
            {!! $errors->first('workflow_tarea_id', '<div class="invalid-feedback">:message</p>') !!}
    
        </div>

        <div class="form-group">
            {{ Form::label('workflow_estado_id', "Estado actual:") }}
            {{ Form::select('workflow_estado_id', $workflow_estados, $workflow->workflow_estado_id, ['class' => 'form-control']) }}
            {!! $errors->first('workflow_estado_id', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('siguiente_estado_id', "Estado siguiente:") }}
            {{ Form::select('siguiente_estado_id', $workflow_estados, $workflow->siguiente_estado_id, ['class' => 'form-control']) }}
            {!! $errors->first('siguiente_estado_id', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('workflow_accione_id'), "Accion:" }}
            {{ Form::select('workflow_accione_id', $workflow_acciones, $workflow->workflow_accione_id, ['class' => 'form-control']) }}
            {!! $errors->first('workflow_accione_id', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-success">Guardar</button>
        <a class="btn btn-primary" href="{{ route('workflows.index') }}"> Volver</a>
    </div>
    
</div>