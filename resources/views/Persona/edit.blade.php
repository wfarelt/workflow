@extends('layouts.app')

@section('content')
<div class="container">

<h1>EDITAR PERSONA</h1>

<form action="{{url ('/persona/'.$persona->id) }}" method="post" enctype="multipart/form-data">
@csrf
{{ method_field('PATCH')}}

@include('persona.form', ['modo'=>'Editar'])

</form>

</div>
@endsection