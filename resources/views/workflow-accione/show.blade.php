@extends('layouts.app')

@section('template_title')
    {{ $workflowAccione->name ?? 'Show Workflow Accione' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Workflow Accione</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('workflow-acciones.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Descripcion:</strong>
                            {{ $workflowAccione->descripcion }}
                        </div>
                        <div class="form-group">
                            <strong>Estado:</strong>
                            {{ $workflowAccione->estado }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
