FORMULARIO DE CREACION DE PERSONA

<form action="{{ url ('/persona') }}" method="post" enctype="multipart/form-data">
@csrf

@include('persona.form')



</form>