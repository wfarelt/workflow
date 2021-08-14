@extends('layouts.app')

@section('template_title')
    {{ $tarea->name ?? 'Show Tarea' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">

            <div class="col-md-8">
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
                                        <h3 class="card-tittle">
                                            {{ $tarea_workflow_estado->descripcion }}
                                        </h3>
                                        <br>
                                        <p class="card-text">
                                            Estado: {{ $tarea_workflow_estado->workflowEstado->descripcion }}
                                            <br>
                                            Fecha: {{ $tarea_workflow_estado->created_at }}
                                            <br>
                                            Creado por: {{ $tarea_workflow_estado->user->name }}
                                        </p>
                                    </div>
                                </div>
                                <br>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">                
                <div class="card">
                            <form method="POST" action="{{ route('tarea-workflow-estados.store') }}"  role="form" enctype="multipart/form-data">
                                @csrf

                                <div class="box box-info padding-1">
                                    <div class="box-body">
                                        
                                    <div class="form-group">
                                        {{ Form::label('descripcion') }}
                                        {{ Form::text('descripcion', null, ['class' => 'form-control' . ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion']) }}
                                        {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</p>') !!}
                                    </div>
                                    
                                    <div class="form-group">
                                        {{ Form::hidden('tarea_id',  $tarea->id, ['class' => 'form-control' . ($errors->has('tarea_id') ? ' is-invalid' : ''), 'placeholder' => 'Tarea Id']) }}
                                        {{ Form::hidden('user_id',  auth()->user()->id, ['class' => 'form-control' . ($errors->has('tarea_id') ? ' is-invalid' : ''), 'placeholder' => 'Tarea Id']) }}
                                        
                                    </div>        

                                    </div>
                                    <div class="box-footer mt20">
                                        @foreach ($workflows as $workflow)
                                            <button name="workflow_estado_id" type="submit" value="{{$workflow->siguiente_estado_id}}"  class="btn btn-success">{{$workflow->workflowAccione->descripcion}}</button>                                            
                                        @endforeach 
                                    </div>
                                </div>

                               

                            </form>
                        </div>
            </div>
        </div>
    </section>
@endsection


