@extends('layouts.plantilla')
@section('contenido')
    <div class="d-flex linea-azul align-items-center ps-5">
        Servicios
    </div>
    <!--Servicios-->
    <div class="container-fluid ps-5 my-5">
        <div class="row">
            @foreach ($servicios as $servicio)
                <div class="col-md-6 mb-5">
                    <div class="row">
                        <div class="col-md-2">
                            <img class="img-fluid d-block mx-auto" src="{{asset(Storage::url($servicio->imagen))}}">
                        </div>
                        <div class="col-md-10">
                            <div class="Servicio-titulo">{{$servicio->titulo}}</div>
                            <div class="Servicio-subtitulo">{{$servicio->subtitulo}}</div>
                            <div class="Servicio-texto">{!!$servicio->texto!!}</div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <!--Formulario-->
    <div class="container-fluid py-5" style="background-color: #F6F6F6">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    @if (session()->has('success'))
                    <div class="alert alert-success">{{session()->get('success')}}</div>
                    @endif
                    @if (session()->has('error'))
                    <div class="alert alert-danger">{{session()->get('error')}}</div>
                    @endif
                    <div class="Servicios-formulario_titulo">¿Necesit&aacutes asesoramiento?</div>
                    <div class="Inicio-titulo-linea"></div>
                    <div class="Servicios-formulario_subtitulo">Cont&aacutectanos y te brindamos toda la informaci&oacuten que necesites</div>
                </div>
                <form action="{{route('servicio.consulta')}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 my-3">
                            <input type="text" class="form-control  my-3" name="nombre-empresa" placeholder="Nombre/Empresa">
                            <input type="text" class="form-control  my-3" name="telefono" placeholder="Telefono">
                        </div>
                        <div class="col-md-6  my-3">
                            <input type="text" class="form-control  my-3" name="correo" placeholder="Correo electronico">
                            <input type="text" class="form-control  my-3" name="localidad" placeholder="Localidad">
                        </div>
                        <div class="col-md-12 ">
                           <textarea class="form-control" name="mensaje" placeholder="Mensaje"></textarea>
                        </div>
                        <div class="col-md-12 my-3">
                            <button type="submit" class="btn float-end Servicios-btn_formulario">Enviar</button>
                        </div>
                    </div>
              
                </form>
            </div>
        </div>
    </div>
@endsection