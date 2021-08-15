@extends('layouts.app')

@section('template_title')
    Create Tarea Workflow Estado
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Create Tarea Workflow Estado</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('tarea-workflow-estados.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('tarea-workflow-estado.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
