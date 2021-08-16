@extends('layouts.app')

@section('template_title')
    Workflow
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Workflow') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('workflows.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Nuevo workflow') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Tipo de Tarea</th>
										<th>Estado actual</th>
										<th>Estado siguiente</th>
										<th>Acción</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($workflows as $workflow)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                    
                                            <td>{{ $workflow->workflowTarea->descripcion  }}</td>
											<td>{{ $workflow->workflowEstado->descripcion }}</td>
											<td>{{ $workflow->siguiente_estado_id }}</td>
											<td>{{ $workflow->workflowAccione->descripcion }}</td>
											

                                            <td>
                                                <form action="{{ route('workflows.destroy',$workflow->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('workflows.show',$workflow->id) }}"><i class="fa fa-fw fa-eye"></i> Ver</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('workflows.edit',$workflow->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Eliminar</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
                {!! $workflows->links() !!}
            </div>
            
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">
                        <h3>Estados Activos</h3>
                    </div>
                    <div class="card-body">
                        @foreach ($workflow_estados as $workflow_estado)
                            <p>{{$workflow_estado}}</p>
                        @endforeach
                    </div>
                    
                </div>
                <br>
                    <div class="card">
                    <div class="card-header">
                        <h3>Acciones Activos</h3>
                    </div>
                    <div class="card-body">
                        @foreach ($workflow_acciones as $workflow_accione)
                            <p>{{$workflow_accione}}</p>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
