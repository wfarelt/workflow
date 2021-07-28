@extends('layouts.app')

@section('template_title')
    Workflow
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Workflow') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('workflows.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
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
                                        
										<th>Workflow Estado Id</th>
										<th>Siguiente Estado Id</th>
										<th>Workflow Accione Id</th>
										<th>Workflow Tarea Id</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($workflows as $workflow)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $workflow->workflow_estado_id }}</td>
											<td>{{ $workflow->siguiente_estado_id }}</td>
											<td>{{ $workflow->workflow_accione_id }}</td>
											<td>{{ $workflow->workflow_tarea_id }}</td>

                                            <td>
                                                <form action="{{ route('workflows.destroy',$workflow->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('workflows.show',$workflow->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('workflows.edit',$workflow->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
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
        </div>
    </div>
@endsection
