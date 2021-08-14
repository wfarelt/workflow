@extends('layouts.app')

@section('content')

<form action="{{url ('/persona/'.$persona->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    {{ method_field('PATCH')}}

    @include('persona.form', ['modo'=>'Editar'])
</form>

@endsection