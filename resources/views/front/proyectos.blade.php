@extends('layouts.plantilla')
@section('contenido')
    <style>
        .Proyecto-texto{
            font-family: 'Gotham-Light';
            font-size: 16px;
            color: white;
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
                            height:459px;
                            background-position:center;
                            ">
                            <div class="col-md-4 ms-5">
                                <div class="imgPrincipal_titulo" style="margin-top:130px">{!!$slider->texto!!}</div>
                                <div style="color:white;margin-top:130px; font-family: 'Gotham-Book';font-size:16px">
                                    INICIO|PROYECTOS
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
                            height:459px;
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
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 text-center mt-5 Seccion-tituloColeccion mb-5">
                DESCUBRI NUESTROS PROYECTOS
            </div>
            @foreach ($proyectos as $proyecto)
            <div class="col-md-6 mx-0 px-0 contenedor">
                <a href="{{route('proyecto',$proyecto->id)}}" style="text-decoration:none">
                <div  class="image" style="background-image: url({{asset(Storage::url($proyecto->img_uno))}});
                    background-repeat:no-repeat;
                    background-position:center;
                    height:440px">

                </div>  
                <div class="overlay ps-3">
                   
                    {{-- <div class="text">       
                  
                    </div> --}}
                    <div class="col-md-12" style="position: relative;top:220px">
                        <div class="Seccion-tituloProducto">
                            {{$proyecto->titulo}}
                        </div>
                        <div class="Proyecto-texto">
                            {!!$proyecto->texto!!}
                            <br> 
                            VER M&Aacute;S
                            <i class="fas fa-arrow-right"></i>
                        </div>
                        
                    </div>
                 
                </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
@endsection