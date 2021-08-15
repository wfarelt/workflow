<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('descripcion') }}
            {{ Form::text('descripcion', $tareaWorkflowEstado->descripcion, ['class' => 'form-control' . ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion']) }}
            {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('workflow_estado_id') }}
            {{ Form::text('workflow_estado_id', $tareaWorkflowEstado->workflow_estado_id, ['class' => 'form-control' . ($errors->has('workflow_estado_id') ? ' is-invalid' : ''), 'placeholder' => 'Workflow Estado Id']) }}
            {!! $errors->first('workflow_estado_id', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('tarea_id') }}
            {{ Form::text('tarea_id',  $tareaWorkflowEstado->tarea_id, ['class' => 'form-control' . ($errors->has('tarea_id') ? ' is-invalid' : ''), 'placeholder' => 'Tarea Id']) }}
            {!! $errors->first('tarea_id', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>