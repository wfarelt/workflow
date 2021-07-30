@extends('layouts.app')

@section('template_title')
    {{ $workflow->name ?? 'Show Workflow' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Workflow</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('workflows.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Workflow Estado:</strong>
                            {{ $workflow->workflowEstado->descripcion }}
                        </div>
                        <div class="form-group">
                            <strong>Siguiente Estado Id:</strong>
                            {{ $workflow->siguiente_estado_id }}
                        </div>
                        <div class="form-group">
                            <strong>Workflow Accione:</strong>
                            {{ $workflow->workflowAccione->descripcion }}
                        </div>
                        <div class="form-group">
                            <strong>Workflow Tarea:</strong>
                            {{ $workflow->workflowTarea->descripcion }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
