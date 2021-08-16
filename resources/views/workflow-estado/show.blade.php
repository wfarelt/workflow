@extends('layouts.app')

@section('template_title')
    {{ $workflowEstado->name ?? 'Show Workflow Estado' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Workflow Estado</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('workflow-estados.index') }}"> Volver</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Descripcion:</strong>
                            {{ $workflowEstado->descripcion }}
                        </div>
                        <div class="form-group">
                            <strong>Estado:</strong>
                            @if($workflowEstado->estado == "1")
                                HABILITADO
                            @else
                                NO HABILITADO
                            @endif
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
