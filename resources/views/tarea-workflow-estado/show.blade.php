@extends('layouts.app')

@section('template_title')
    {{ $tareaWorkflowEstado->name ?? 'Show Tarea Workflow Estado' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Tarea Workflow Estado</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('tarea-workflow-estados.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Descripcion:</strong>
                            {{ $tareaWorkflowEstado->descripcion }}
                        </div>
                        <div class="form-group">
                            <strong>Workflow Estado Id:</strong>
                            {{ $tareaWorkflowEstado->workflow_estado_id }}
                        </div>
                        <div class="form-group">
                            <strong>Tarea Id:</strong>
                            {{ $tareaWorkflowEstado->tarea_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
