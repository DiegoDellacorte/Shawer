@extends('layouts.plantilla')
@section('contenido')
    <!--Slider-->
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach ($sliders as $slider)
                @if($loop->first)
                    <div class="carousel-item active">
                        <div class="row" style=" 
                            background-image:url('{{url('/')}}/images/sliders/{{$slider->imagen}}');
                            background-size:cover;
                            background-repeat:no-repeat;
                            height:396px;
                            background-position:center;
                            ">
                            <div class="col-md-4 ms-auto">
                                <div class="imgPrincipal_titulo" style="margin-top:130px">{!!$slider->texto!!}</div>
                            </div>
                        </div>
                    </div>
                @else 
                    <div class="carousel-item">
                        <div class="row" style=" 
                            background-image:url('{{url('/')}}/images/sliders/{{$slider->imagen}}');
                            background-size:cover;
                            background-repeat:no-repeat;
                            height:396px;
                            ">
                            <div class="col-md-4 ms-auto ">
                                <div class="imgPrincipal_titulo">{!!$slider->texto!!}</div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach 
        </div>
    </div>
    <!--Categorias-->
    <div class="container my-5">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="Inicio-titulo">
                    Nuestras M&aacutequinas
                </div>
                <div class="Inicio-titulo-linea"></div>
            </div> 
        </div>
        <div class="row my-5">
            @foreach ($categorias as $categoria)
            <div class="col-md-3">
                <a class="enlace_categoria" href="">
                    <div class="card">
                        <div class="" style="background-image: url({{asset(Storage::url($categoria->imagen))}});
                            height:220px;
                            width:220px;
                            background-repeat:no-repeat;
                            background-size:cover;
                            margin:auto">
                        </div>
                    </div>
                    <div class="titulo-categoria">
                        {{$categoria->titulo}}
                    </div>
                </a>
            </div>
        @endforeach
        </div>
    </div>
    <!--Nuestra Empresa-->
    <div class="container-fluid mt-5">
            <div class="row" style="
                background:linear-gradient(rgba(39, 98, 157, 0.8),rgba(39, 98, 157, 0.8)), url({{asset(Storage::url($seccionInicio->imagen))}});
                background-size: cover;
                background-position:center;
                background-repeat: no-repeat;
                height:400px;
                ">
            
                <div class="col-md-6  my-auto ps-5">
                    <div class="tituloSeccionEmpresa"> {{$seccionInicio->titulo}}</div>
                    <div class="subtituloSeccionEmpresa"> {{$seccionInicio->subtitulo}}</div>
                    <div class="textoSeccionEmpresa">{!!$seccionInicio->texto!!}</div>
                    <a class="btn boton_conoce" href="{{route('contacto')}}">
                                Conoce Más
                    </a>    
                </div>
                <div class="col-md-6 my-auto">
                    <div class="row">
                        @foreach ($serviciosInicio as $servicio)
                        <div class="col-md-2 my-3">
                            <img class="img-fluid d-block mx-auto" src="{{asset(Storage::url($servicio->imagen))}}">
                        </div>
                        <div class="col-md-10 my-3 ps-0">
                            <div class="tituloServicioInicio">{{$servicio->titulo}}</div>
                            <div class="textoServicioInicio">{{$servicio->texto}}</div>
                        </div>  
                        @endforeach
                    </div>
                   
                </div>
            </div>
       
    </div> 
    <!--Productos-->
    <div class="container my-5">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="Inicio-titulo">
                    Productos Destacados
                </div>
                <div class="Inicio-titulo-linea"></div>
            </div> 
        </div>
        <div class="row my-5">
            @foreach ($productos_destacados as $prod)
            <div class="col-md-3">
                <a class="enlace_categoria" href="">
                    <div class="card">
                        <div class="" style="background-image: url({{asset(Storage::url($categoria->imagen))}});
                            height:220px;
                            width:220px;
                            background-repeat:no-repeat;
                            background-size:cover;
                            margin:auto">
                        </div>
                    </div>
                    <div class="titulo-categoria">
                        {{$prod->nombre}}
                    </div>
                </a>
            </div>
        @endforeach
        </div>
    </div> 
@endsection