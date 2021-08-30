<h6>Consulta  realizada por: {{$dataRequest['nombre-empresa']}}</h6>
<h6>Telefono: {{$dataRequest['telefono']}} </h6>
<h6>Correo: {{$dataRequest['correo']}}</h6>
@if ($dataRequest['localidad'])
<h6>Localidad: {{$dataRequest['localidad']}}</h6>
@endif

@if ($dataRequest['mensaje'])
<h6>Mensaje: {{$dataRequest['mensaje']}}</h6>
@endif