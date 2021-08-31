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
@endsection