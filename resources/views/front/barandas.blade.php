@extends('layouts.plantilla')
@section('contenido')
    <style>
        .btntxt1{
            position: relative;
            top: 450px;
            left: 340px;
        }
        .btntxt2{
            position: relative;
           bottom: 100px;
            left: 750px;
        }
        .soportes-titulo{
            font-family: 'Gotham-Light';
            color: #333333;
            font-size: 25px;
        }
        .soportes-texto{
            font-family: 'Gotham-Light';
            color: #707070;
            font-size: 18px;
            text-align: center;
            margin-top: 25px;
        }
    </style>
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
                                <div class="imgPrincipal_titulo" style="margin-top:130px">{!!$slider->texto!!}</div>
                                <div style="color:white;margin-top:130px; font-family: 'Gotham-Book';font-size:16px">
                                    INICIO|BARANDAS
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
                    BARANDAS
                </div>
            </div>
            <div class="col-md-6 mt-5 animate__animated animate__fadeInRight animate__slow">
                <img class="seccion-img_dos d-block ms-auto" src="{{asset(Storage::url($seccionBaranda->img_dos))}}">
            </div>
            <div class="col-md-6 mt-5 animate__animated animate__fadeInRight animate__slow">
                <div class="seccion-titulo_texto"> {{$seccionBaranda->titulo}}</div>
                <div class="seccion-texto_descripcion">{!!$seccionBaranda->texto!!}</div>
            </div>
            <div class="col-md-6 animate__animated animate__fadeInLeft animate__slow">
                <img class="img-fluid seccion-img_dos me-auto d-md-block d-none" style="position: relative;z-index:1000;top:-120px" src="{{asset(Storage::url($seccionBaranda->img_uno))}}">
                <img class="img-fluid seccion-img_dos me-auto d-block d-md-none mb-5"  src="{{asset(Storage::url($seccionBaranda->img_uno))}}">
            </div>
        </div>
    </div>
    <!--Imagen Principal-->
    <div class="container-fluid d-md-block d-none">
        <div class="row" style="
            background-image: url({{asset(Storage::url($seccionBaranda->img_principal))}});
            height:768px;
            background-repeat:no-repeat;
            background-position:center;
            ">
            <div class="">
                <i class="fas fa-plus-circle btntxt1 fa-lg" onclick="mostrarTextoUno()" style="color: #FFFFFF"></i>
            </div>
            <div class="col-md-12">
                <div class="d-flex d-inline flex-column w-25 px-3 d-none" id="texto1" style="border:10px solid #FFFFFF40; background-color:#FFFFFF4D;font-family:'Gotham-Light';font-size:16px;color:#333333;margin-top:60px">
                    {!!$seccionBaranda->texto_imgprincipal1!!}
                </div>
            </div>
           
            <div class="col-md-12">
                <div class="d-flex d-inline flex-column w-25 px-3 d-none " id="texto2" style="border:10px solid #FFFFFF40; background-color:#FFFFFF4D;font-family:'Gotham-Light';font-size:16px;color:#333333;margin-top:-150px;margin-left:750px">
                    {!!$seccionBaranda->texto_imgprincipal2!!}
                </div>
            </div>
            <div class="">
                <i class="fas fa-plus-circle btntxt2 fa-lg" onclick="mostrarTextoDos()" style="color: #FFFFFF"></i>
            </div>
        </div>
    </div>
    <!--Soportes-->
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="soportes-titulo">
                    SOPORTES
                </div>
            </div>
            <div class="col-md-4 mt-5">
                <img class="img-fluid d-block mx-auto" src="{{asset(Storage::url($seccionBaranda->img_soporte1))}}">
                <div class="soportes-texto">{{$seccionBaranda->titulo_soporte1}}</div>
            </div>
            <div class="col-md-4 mt-5">
                <img class="img-fluid d-block mx-auto" src="{{asset(Storage::url($seccionBaranda->img_soporte2))}}">
                <div class="soportes-texto">{{$seccionBaranda->titulo_soporte2}}</div>
            </div>
            <div class="col-md-4 mt-5">
                <img class="img-fluid d-block mx-auto" src="{{asset(Storage::url($seccionBaranda->img_soporte3))}}">
                <div class="soportes-texto">{{$seccionBaranda->titulo_soporte3}}</div>
            </div>
        </div>
    </div>
    <!--Productos-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 text-center mt-5 Seccion-tituloColeccion mb-5">
                DESCUBRI TODA LA COLECCI&Oacute;N
            </div>
            @php
                $i=1;
            @endphp
            @foreach ($barandas as $baranda)
                <div class="col-md-4 mx-0 px-0 contenedor">
                    <a href="{{route('baranda',$baranda->id)}}" style="text-decoration:none">
                    @if (!$loop->first)
                    @php
                        $imagen=asset('images/barandas/0'.$i.'.jpg');
                    @endphp
                    <div  class="image" style="background-image: url({{$imagen}});
                        background-repeat:no-repeat;
                        background-position:center;
                        height:316px">

                    </div>  
                    @php
                        $i++;
                    @endphp
                    @else 
                    <div  class="image" style="background-image: url({{asset(Storage::url($baranda->img_principal))}});
                        background-repeat:no-repeat;
                        background-position:center;
                        height:316px">

                    </div>  
                    @endif
                  
                    <div class="overlay">
                       
                        <div class="text">       
                        <i class="fas fa-plus-circle fa-2x"></i>
                        </div>
                        <div class="col-md-12" style="position: relative;top:220px">
                            <div class="Seccion-tituloProducto">
                                {{$baranda->titulo}}
                            </div>
                        </div>
                     
                    </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
    <script>
        function mostrarTextoUno(){
            $('#texto1').toggleClass('d-none');
        }
        function mostrarTextoDos(){
            $('#texto2').toggleClass('d-none');
        }
    </script>
@endsection