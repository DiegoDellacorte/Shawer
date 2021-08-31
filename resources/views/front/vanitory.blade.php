@extends('layouts.plantilla')
@section('contenido')
    <style>
       .table{
           font-family: 'Gotham-Book';
           font-size: 17px;
           color: #707070;
       }
       .tituloTabla{
        font-family: 'Gotham-Book';
           font-size: 17px;
           color: #707070;
       }
       .color{
           color: #707070;
           font-family: 'Gotham-Book';
           font-size: 14px;
           text-align: center
       }
    </style>
    <!--Img Principal-->
    <div class="container-fluid">
        <div class="row ps-5" style="background-image:linear-gradient(rgba(255, 255, 255, 0.1),rgba(0, 0, 0, 0.8)), url({{asset(Storage::url($vanitory->img_principal))}});
            height:514px;
            background-position:center;
            background-repeat:no-repeat;">
            
            
            <div class="tituloProducto w-75 ms-0" style="padding-top: 140px">
               
                {{$vanitory->titulo}}
                <div class="ms-0" style="color:white;margin-top:40px; font-family: 'Gotham-Book';font-size:16px">
                    INICIO|vanitoryS|{{$vanitory->titulo}}
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
                    {{$vanitory->titulo}}
                </div>
            </div>
            <div class="col-md-6 mt-5 animate__animated animate__fadeInRight animate__slow">
                <img class="seccion-img_dos d-block ms-auto" src="{{asset(Storage::url($vanitory->img_dos))}}">
            </div>
            <div class="col-md-6 mt-5 animate__animated animate__fadeInRight animate__slow">
                {{-- <div class="seccion-titulo_texto"> {{$vanitory->titulo}}</div> --}}
                <div class="seccion-texto_descripcion">{!!$vanitory->texto!!}</div>
                @if ($vanitory->tabla!=null)
                    <div class="tituloTabla">
                        VANITORY
                    </div>
                    {!!$vanitory->tabla!!}
                @endif
                
                @if ($vanitory->tabla2!=null)
                    <div class="tituloTabla">
                        ESTANTE
                    </div>
                    {!!$vanitory->tabla2!!}
                @endif
                <div class="tituloTabla">
                    COLORES (BRILLANTE/MATE)
                </div>
                <div class="d-flex justify-content-around mt-2">
                    <div>
                        <img src="{{asset('images/colores/aluminio.png')}}">
                        <div class="color">Aluminio</div>
                    </div>
                    <div>
                        <img src="{{asset('images/colores/platil.png')}}">
                        <div class="color">Platil</div>
                    </div>
                    <div>
                        <img src="{{asset('images/colores/acero.png')}}">
                        <div class="color">Acero</div>
                    </div>
                    <div>
                        <img src="{{asset('images/colores/peltre.png')}}">
                        <div class="color">Peltre</div>
                    </div>
                    <div>
                        <img src="{{asset('images/colores/oro.png')}}">
                        <div class="color">Oro</div>
                    </div>
                </div>
                <div class="tituloTabla mt-4">
                    COLORES CRISTALES
                </div>
                <div class="d-flex justify-content-around mt-2">
                    <div>
                        <img src="{{asset('images/colores/incoloro.png')}}">
                        <div class="color">Incoloro</div>
                    </div>
                    <div>
                        <img src="{{asset('images/colores/satinado.png')}}">
                        <div class="color">Satinado</div>
                    </div>
                    <div>
                        <img src="{{asset('images/colores/rojo.png')}}">
                        <div class="color">Rojo</div>
                    </div>
                    <div>
                        <img src="{{asset('images/colores/negro.png')}}">
                        <div class="color">Negro</div>
                    </div>
                    <div>
                        <img src="{{asset('images/colores/naranja.png')}}">
                        <div class="color">Naranja</div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 animate__animated animate__fadeInLeft animate__slow">
                @if ($vanitory->tabla!=null || $vanitory->tabla2!=null)
                <img class="img-fluid seccion-img_dos me-auto d-md-block d-none" style="position: relative;z-index:1000;top:-700px" src="{{asset(Storage::url($vanitory->img_uno))}}">
                @else
                <img class="img-fluid seccion-img_dos me-auto d-md-block d-none" style="position: relative;z-index:1000;top:-300px" src="{{asset(Storage::url($vanitory->img_uno))}}">

                @endif
                <img class="img-fluid seccion-img_dos me-auto d-block d-md-none mb-5"  src="{{asset(Storage::url($vanitory->img_uno))}}">
            </div>
        </div>
    </div>
   
@endsection