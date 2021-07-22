@extends('layouts.app')

@section('content')
<div class="container">

<h1>FORMULARIO DE CREACION DE PERSONA</h1>

<form action="{{ url ('/persona') }}" method="post" enctype="multipart/form-data">
@csrf

@include('persona.form', ['modo'=>'Crear'])


</form>

</div>
@endsection