@extends('layouts.app')

@section('template_title')
    {{ $workflowTarea->name ?? 'Show Workflow Tarea' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Workflow Tarea</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('workflow-tareas.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Descripcion:</strong>
                            {{ $workflowTarea->descripcion }}
                        </div>
                        <div class="form-group">
                            <strong>Estado:</strong>
                            {{ $workflowTarea->estado }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
