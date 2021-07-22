@if(count($errors)>0)
    <div class="alert alert-danger" role="alert">
        <ul>
        @foreach( $errors->all() as $error)
            <li>
                {{ $error}} 
            </li>    
        @endforeach
        </ul>
    </div>
    
@endif


<div class="form-group">
    <label for="Nombre">Nombre</label>
    <input type="text" class="form-control" name="Nombre" value="{{ isset($persona->Nombre)?$persona->Nombre:old('Nombre')}}" id="Nombre">
</div>

<div class="form-group">
    <label for="Email">Email</label>
    <input type="text" class="form-control" name="Email" value="{{ isset($persona->Email)?$persona->Email:old('Email')}}" id="Email">
</div>

<div class="form-group">
    <label for="Telefono">Telefono</label>
    <input type="text" class="form-control" name="Telefono" value="{{ isset($persona->Telefono)?$persona->Telefono:old('Telefono')}}" id="Telefono">
</div>

<div class="form-group">
    <label for="Foto">Foto </label>

    @if(isset($persona->Foto))
    <img src="{{ asset('storage').'/'.$persona->Foto }}" width="150" alt="">
    @endif
    <input type="file" name="Foto"  id="Foto">
</div>


<input class="btn btn-success" type="submit" value=" {{ $modo}} datos">

<a class="btn btn-primary" href="{{ url('persona') }}">Regresar</a>