@extends('layouts.app')

@section('content')

    <div class="card shadow">
        <h5 class="card-header">Personas</h5>
        <div class="card-body">
            @if(Session::has('mensaje'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('mensaje') }}      
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>    
                </div>
            @endif

            <div>
                <a href="{{ url('persona/create') }}" class="btn btn-primary"> Añadir Persona </a>
            </div>

            <br>

            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Foto</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Teléfono</th>
                            <th>Usuario</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach( $personas as $persona)
                        <tr>
                            <td>{{ $persona->id }}</td>
                            <td>
                                <img class="img-thumbnail img-fluid" src="{{ asset('storage').'/'.$persona->Foto }}" width="50" alt="">
                            </td>
                            <td>{{ $persona->Nombre }}</td>
                            <td>{{ $persona->Email }}</td>
                            <td>{{ $persona->Telefono }}</td>
                            <td>{{ $persona->user->name }}</td>
                            <td>
                                <a href="{{ url('/persona/'.$persona->id.'/edit')}}" class="btn btn-warning">
                                    Editar
                                </a>
                                │
                                <form action="{{ url ('/persona/'.$persona->id)}}" method="post" class="d-inline">
                                    @csrf
                                    {{ method_field('DELETE')}}
                                    <input type="submit" class="btn btn-danger" onclick="return confirm('¿Quieres borrar?')" value="Borrar">
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                
                <br>
                
                {{-- Pagination --}}
                <div class="d-flex justify-content-center">
                    {!! $personas->links() !!}
                </div>
                
            </div>

           
        </div>
    </div>   

@endsection