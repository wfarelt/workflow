@extends('layouts.app')

@section('template_title')
    Update Tarea Workflow Estado
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Update Tarea Workflow Estado</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('tarea-workflow-estados.update', $tareaWorkflowEstado->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('tarea-workflow-estado.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
