@extends('layouts.plantilla')
@section('contenido')
    <style>
       .table{
           font-family: 'Gotham-Book';
           font-size: 17px;
           color: #707070;
       }
    </style>
    <!--Img Principal-->
    <div class="container-fluid">
        <div class="row ps-5" style="background-image:linear-gradient(rgba(255, 255, 255, 0.1),rgba(0, 0, 0, 0.8)), url({{asset(Storage::url($mampara->img_principal))}});
            height:514px;
            background-position:center;
            background-repeat:no-repeat;">
            
            
            <div class="tituloProducto w-75 ms-0" style="padding-top: 140px">
               
                {{$mampara->titulo}}
                <div class="ms-0" style="color:white;margin-top:40px; font-family: 'Gotham-Book';font-size:16px">
                    INICIO|MAMPARAS|{{$mampara->titulo}}
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
                    {{$mampara->titulo}}
                </div>
            </div>
            <div class="col-md-6 mt-5 animate__animated animate__fadeInRight animate__slow">
                <img class="seccion-img_dos d-block ms-auto" src="{{asset(Storage::url($mampara->img_dos))}}">
            </div>
            <div class="col-md-6 mt-5 animate__animated animate__fadeInRight animate__slow">
                {{-- <div class="seccion-titulo_texto"> {{$mampara->titulo}}</div> --}}
                <div class="seccion-texto_descripcion">{!!$mampara->texto!!}</div>
                {!!$mampara->tabla!!}
            </div>
            <div class="col-md-6 animate__animated animate__fadeInLeft animate__slow">
                <img class="img-fluid seccion-img_dos me-auto d-md-block d-none" style="position: relative;z-index:1000;top:-120px" src="{{asset(Storage::url($mampara->img_uno))}}">
                <img class="img-fluid seccion-img_dos me-auto d-block d-md-none mb-5"  src="{{asset(Storage::url($mampara->img_uno))}}">
            </div>
        </div>
    </div>
   
@endsection