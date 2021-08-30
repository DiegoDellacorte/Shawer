<table class="table" id="tablaProductos">
    <thead style="background-color: #17313A;color:white;font-family:'OpenSans-Regular';font-size:14px">
        <th>NOMBRE</th>
        <th>CATEGORIA</th>
        <th>CANTIDAD</th>
      
    </thead>
     {{-- <tbody> --}}
        @foreach ($productos as $prodTabla)
        <tr>
            <td>{{$prodTabla->nombre}}</td>
            <td>{{$prodTabla->categoria}}</td>
            <td>
                {{$prodTabla->cantidad}}
            </td>
        </tr>
    @endforeach
  
{{-- </tbody> --}}
</table>
<h6>Pedido realizado por: {{$dataRequest['nombre-empresa']}}</h6>
<h6>Telefono: {{$dataRequest['telefono']}} </h6>
<h6>Correo: {{$dataRequest['correo']}}</h6>
@if ($dataRequest['localidad'])
<h6>Localidad: {{$dataRequest['localidad']}}</h6>
@endif

@if ($dataRequest['mensaje'])
<h6>Mensaje: {{$dataRequest['mensaje']}}</h6>
@endif