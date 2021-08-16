@extends('layouts.app')

@section('template_title')
    {{ $cargo->name ?? 'Show Cargo' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Cargo</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('cargos.index') }}"> Volver</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Descripcion:</strong>
                            {{ $cargo->descripcion }}
                        </div>
                        <div class="form-group">
                            <strong>Estado:</strong>
                            {{ $cargo->estado }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
