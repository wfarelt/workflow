@extends('layouts.app')

@section('template_title')
    {{ $tarea->name ?? 'Show Tarea' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Tarea</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('tareas.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Workflow Tarea Id:</strong>
                            {{ $tarea->workflow_tarea_id }} -> {{ $tarea->workflowTarea->descripcion }}
                        </div>

                        <div class="dropdown-divider"></div>
                        <div>
                            <strong>Tarea_Workflow_estados:</strong>
                            <br>
                            <br>
                            @foreach ($tarea_workflow_estados as $tarea_workflow_estado)
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-tittle">
                                            {{ $tarea_workflow_estado->descripcion }}
                                        </h5>
                                        <p class="card-text">
                                            Estado: {{ $tarea_workflow_estado->workflowEstado->descripcion }}
                                        </p>
                                        <p class="card-text">
                                            Fecha: {{ $tarea_workflow_estado->created_at }}
                                        </p>
                                    </div>
                                </div>
                                <br>
                            @endforeach
                        </div>

                        <div>
                            @foreach ($workflows as $workflow)
                                <button class="btn btn-success">{{$workflow->workflowAccione->descripcion}}</button>
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
