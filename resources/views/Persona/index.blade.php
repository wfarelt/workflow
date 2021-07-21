<H1>PERSONAS</H1>

<div class="container">
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Teléfono</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach( $personas as $persona)
                <tr>
                    <td>{{ $persona->id }}</td>
                    <td>{{ $persona->Nombre }}</td>
                    <td>{{ $persona->Email }}</td>
                    <td>{{ $persona->Telefono }}</td>
                    <td>Editar -
                        <form action="{{ url ('/persona/'.$persona->id)}}" method="post">
                            @csrf
                            {{ method_field('DELETE')}}
                            <input type="submit" onclick="return confirm('¿Quieres borrar?')" value="Borrar">
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
