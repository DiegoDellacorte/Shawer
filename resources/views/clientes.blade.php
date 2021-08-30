@extends('layouts.plantilla')
@section('contenido')
<div class="d-flex linea-azul align-items-center ps-5">
    Clientes
</div>
<!--Clientes-->
<div class="container-fluid mb-5 ps-5 ">
    <div class="row">
        @foreach ($clientes as $cliente)
            <div class="col-md-3  mt-4" >
              <div class="border" style="background-image: url({{asset(Storage::url($cliente->imagen))}});
                height:250px;
                width:100%;
                background-size:contain;
                background-repeat:no-repeat;
                background-position:center;">
                
              </div>
            </div>
        @endforeach
    </div>
</div>
@endsection