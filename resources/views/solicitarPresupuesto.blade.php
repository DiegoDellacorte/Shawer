@extends('layouts.plantilla')
@section('contenido')
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

<!-- CSS -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
<!-- Default theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
<!-- Semantic UI theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
<!-- Bootstrap theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>
<style>
    .borrar-producto{
        color: #707070
    }
    .borrar-producto::after{
        font-family: "Font Awesome 5 Free"; font-weight: 900; content: "\f1f8";
        /* content: '\f1f8'; */
    }
</style>
<div class="d-flex linea-azul align-items-center ps-5">
    Solicitar Presupuesto
</div>
<div class="container-fluid ps-5 my-5">
    <div class="row">
        <div class="col-md-12">
            <table id="tablaProductos"  class="table" style="font-family: 'Poppins-Medium';">
                <thead>
                    <th></th>
                    <th>Categoria</th>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Eliminar</th>
                </thead>
            </table>
        </div>
        <div class="col-md-12">
            <form id="formPresupuesto">
                @csrf
                <div class="row">
                    <div class="col-md-12 text-center">
                        <div class="Servicios-formulario_titulo">Ingrese sus datos</div>
                        <div class="Inicio-titulo-linea mt-3"></div>
                       
                    </div>
                    <form id="formPresupuesto">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 my-3">
                                <input type="text" class="form-control  my-3" name="nombre-empresa" placeholder="Nombre/Empresa" required>
                                <input type="text" class="form-control  my-3" name="telefono" placeholder="Telefono" required>
                            </div>
                            <div class="col-md-6  my-3">
                                <input type="text" class="form-control  my-3" name="correo" placeholder="Correo electronico" required>
                                <input type="text" class="form-control  my-3" name="localidad" placeholder="Localidad">
                            </div>
                            <div class="col-md-12 ">
                               <textarea class="form-control" name="mensaje" placeholder="Mensaje"></textarea>
                            </div>
                            <div class="col-md-6 my-3">
                                <a href="{{route('categorias')}}" class="btn float-start btn_ficha" >Agregar Productos</a>
                            </div>
                            <div class="col-md-6 my-3">
                                <button type="submit" class="btn float-end Servicios-btn_formulario" onclick="tomarProductos()">Solicitar Presupuesto</button>
                            </div>
                        </div>
                  
                    </form>
                </div>
            </form>
           
        </div>
    </div>
</div>
<script src="{{asset('js/productos.js')}}"></script>
<script>
    cargarProductos();
</script>
@endsection