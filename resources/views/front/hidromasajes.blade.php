@extends('layouts.plantilla')
@section('contenido')
    <!--Slider-->
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach ($sliders as $slider)
                @if($loop->first)
                    <div class="carousel-item active">
                        <div class="row" style=" 
                            background-image:linear-gradient(rgba(255, 255, 255, 0.1),rgba(0, 0, 0, 0.8)),url('{{url('/')}}/images/sliders/{{$slider->imagen}}');
                            background-size:cover;
                            background-repeat:no-repeat;
                            height:769px;
                            background-position:center;
                            ">
                            <div class="col-md-4 ms-5">
                                <div class="imgPrincipal_titulo" style="margin-top:250px">{!!$slider->texto!!}</div>
                                <div style="color:white;margin-top:130px; font-family: 'Gotham-Book';font-size:16px">
                                    INICIO|HIDROMASAJES
                                </div>
                            </div>
                        </div>
                    </div>
                @else 
                    <div class="carousel-item">
                        <div class="row" style=" 
                            background-image:url('{{url('/')}}/images/sliders/{{$slider->imagen}}');
                            background-size:cover;
                            background-repeat:no-repeat;
                            height:769px;
                            ">
                            <div class="col-md-4 ms-5 ">
                                <div class="imgPrincipal_titulo">{!!$slider->texto!!}</div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach 
        </div>
    </div>
    <!--Descripcion-->
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-5 text-center animate__animated animate__fadeInRight animate__slow">
                <div class="seccion-titulo">
                    {{$seccionHidromasaje->titulo}}
                </div>
            </div>
            <div class="col-md-6 mt-5 animate__animated animate__fadeInRight animate__slow">
                <img class="seccion-img_dos d-block ms-auto" src="{{asset(Storage::url($seccionHidromasaje->img_dos))}}">
            </div>
            <div class="col-md-6 mt-5 animate__animated animate__fadeInRight animate__slow">
                <div class="seccion-titulo_texto"> {{$seccionHidromasaje->titulo}}</div>
                <div class="seccion-texto_descripcion">{!!$seccionHidromasaje->texto!!}</div>
            </div>
            <div class="col-md-6 animate__animated animate__fadeInLeft animate__slow">
                <img class="img-fluid seccion-img_dos me-auto d-md-block d-none" style="position: relative;z-index:1000;top:-120px" src="{{asset(Storage::url($seccionHidromasaje->img_uno))}}">
                <img class="img-fluid seccion-img_dos me-auto d-block d-md-none mb-5"  src="{{asset(Storage::url($seccionHidromasaje->img_uno))}}">
            </div>
        </div>
    </div>
    
@endsection