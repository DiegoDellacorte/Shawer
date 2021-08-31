@extends('layouts.plantilla')
@section('contenido')
    <div class="container-fluid">
        <div class="row ps-5" style="background-image:linear-gradient(rgba(255, 255, 255, 0.1),rgba(0, 0, 0, 0.8)), url({{asset(Storage::url($baranda->img_principal))}});
            height:514px;
            background-position:center;
            background-repeat:no-repeat;">
            
            
            <div class="tituloProducto w-75 ms-0" style="padding-top: 140px">
                <div class="tituloCategoria ms-0" style="">Barandas</div>
                {{$baranda->titulo}}
                <div class="ms-0" style="color:white;margin-top:40px; font-family: 'Gotham-Book';font-size:16px">
                    INICIO|BARANDAS |{{$baranda->titulo}}
                </div>
            </div>
          
            </div>
        </div>
        
    </div>
    <!--Descripcion-->
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-5 text-center animate__animated animate__fadeInRight animate__slow">
                <div class="seccion-titulo">
                    BARANDAS
                </div>
            </div>
            <div class="col-md-6 mt-5 animate__animated animate__fadeInRight animate__slow">
                <img class="seccion-img_dos d-block ms-auto" src="{{asset(Storage::url($baranda->img_dos))}}">
            </div>
            <div class="col-md-6 mt-5 animate__animated animate__fadeInRight animate__slow">
                <div class="seccion-titulo_texto"> {{$baranda->titulo}}</div>
                <div class="seccion-texto_descripcion">{!!$baranda->texto!!}</div>
            </div>
            <div class="col-md-6 animate__animated animate__fadeInLeft animate__slow">
                <img class="img-fluid seccion-img_dos me-auto d-md-block d-none" style="position: relative;z-index:1000;top:-120px" src="{{asset(Storage::url($baranda->img_uno))}}">
                <img class="img-fluid seccion-img_dos me-auto d-block d-md-none mb-5"  src="{{asset(Storage::url($baranda->img_uno))}}">
            </div>
        </div>
    </div>
@endsection